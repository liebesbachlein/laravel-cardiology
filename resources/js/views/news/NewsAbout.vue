<template>
    <div class="site-content">
        <div class="site-content-in">
            <div class="newsabout multi-page">
                <div class="breadcrumbs-box">
                    <div class="breadcrumb-past">
                        <router-link to="/">Главная</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/news">Новости</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                </div>

                <div class="multi-page-box">                   
                    <div class="multi-page-content">
                        <div v-if="error">
                            <h3>Ошибка 404</h3>
                            <h3>Такой новости нет ...</h3>
                        </div>
                        <div v-else-if="newsItem.title != null" class="newsabout-content">
                                
                            <div class="newsabout-phrase-date">
                                <div class="newsabout-phrase">
                                    {{ newsItem.phrase }}
                                </div>
                                <div class="newsabout-date">
                                    {{ newsItem.date_published }}
                                </div>
                            </div>
                            <div class="newsabout-title">
                                    {{ newsItem.title }}
                            </div>
                            <div class="newsabout-summary">
                                {{ newsItem.summary }}
                            </div>
                            
                            <div class="newsabout-content" v-html="newsItem.content">
                            </div>
                        </div>
                        <LoaderCircle v-else/>
                    </div>
                    <div class="page-side">
                        <div class="page-side-box">
                            <router-link to="/specialists/education">
                                <SideBarHeadingsNoUrl  check="true" heading="Записаться на обучение"/>
                            </router-link>
                            <router-link to="/specialists/membership">
                                <SideBarHeadingsNoUrl  check="true" heading="Стать членом Общества"/>
                            </router-link>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <Footer/>
    </div>
</template>

<script>
import ChevronRight from '@/components/ChevronRight.vue';
import SideBarHeadingsNoUrl from '@/components/SideBarHeadingsNoUrl.vue';
import Footer from '@/components/Footer.vue';
import { ref} from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';
//import { getNewsItemById  } from '@/firebase/config';
import LoaderCircle from '@/components/LoaderCircle.vue';

export default {
    name: "NewsAbout",
    components: {ChevronRight,  SideBarHeadingsNoUrl, Footer, LoaderCircle},
    mounted() {
        if(this.newsItem.value != null) {
            const link = document.getElementById(news.id)
            if(link != null) {
                link.addEventListener('click.prevent', (e) => {
                    e.preventDefault()
                    downloadItem(news.id, 'Программа мероприятия (pdf)')
                    e.stopImmediatePropagation();
                })
            }
        }

        const downloadItem = (url, label) => {
            axios.get(url, { responseType: 'blob' })
                .then(response => {
                const blob = new Blob([response.data], { type: 'application/pdf' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = label;
                link.click();
                URL.revokeObjectURL(link.href);
            }).catch(console.error);
        };
    },
    setup() { 
    const newsItem = ref([null])
    const error = ref(null)    
    const route = useRoute()

    const load = async () => {
        const id = route.params.id
        axios.get('/api/news-items/' + id).then((response) => {
            newsItem.value = response.data
        }).catch((err) => {
            error.value = err.message
            console.log(error.value)
        })

    }
    
    load()


    return { newsItem, error}
  }
}

</script>

<style>
.newsabout {
    display: block;
    width: 100%;
    margin-top: 3rem;
    padding: 0 1rem;
    min-height: calc(100vh - 3rem);
}

.newsabout-phrase-date {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}
.newsabout-phrase-date>div {
    font-size: 0.8125rem;
    font-weight: 300;
    margin: 0;
    color: var(--component-accent-color2);
}

.newsabout-phrase {
    text-transform: uppercase;
}

.newsabout-title {
    display: block;
    font-size: 2rem;
    font-family: var(--news-title-font);
    font-weight: 400;
    margin-bottom: 1rem;
}

.newsabout-summary {
    display: block;
    color: var(--component-accent-color2);
    letter-spacing: 1px;
    font-weight: 300;
    font-size: 0.9275rem;
    margin-bottom: 1rem;
}


@media only screen and (min-width: 1024px) {
.newsabout {
    min-height: 100vh; 
    padding: 0;
}
}

</style>