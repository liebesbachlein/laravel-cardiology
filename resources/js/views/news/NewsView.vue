<template>
    <div class="site-content">
        <div class="site-content-in">
            <div class="newsfeed multi-page">
                <div class="breadcrumbs-box">
                    <div class="breadcrumb-past">
                        <router-link to="/">Главная</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/news/">Новости</router-link>
                    </div>
                </div>

                <div class="multi-page-box">
                    <div class="newsfeed-timeline multi-page-content">
                        <div v-if="error">
                            <h3>Произошла ошибка</h3>
                            <h3>{{ error }}</h3>
                        </div>
                        <div v-else-if="newsFeed.length > 1" style="width: 100%">
                            <div v-for="newsItem in newsFeed" :key="newsItem? newsItem.id : null" style="width: 100%">
                                <div v-if="newsItem? newsItem.id : null" style="width: 100%">
                                    <NewsShort :newsItem="newsItem? newsItem : null"/>
                                </div>
                            </div>
                        </div>
                        <div v-else><Loader/></div>

                        <div class="long-blue-button" v-if="isLoadMore" @click="loadMore">
                            Загрузить еще
                        </div>
                    </div>
                    
                    <div class="page-side">
                        <div class="page-side-box">
                            <router-link to="/specialists/education">
                                <SideBarHeadingsNoUrl check="true" heading="Записаться на обучение"/>
                            </router-link>
                            <router-link to="/specialists/membership">
                                <SideBarHeadingsNoUrl check="true" heading="Стать членом Общества"/>
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
import NewsShort from './NewsShort.vue';
import Footer from '@/components/Footer.vue';
import Loader from '@/components/Loader.vue';
import NewsAbout from './NewsAbout.vue';
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';
//import { getNewsItemAll  } from '@/firebase/config';
import SideBarHeadingsNoUrl from '@/components/SideBarHeadingsNoUrl.vue';

export default {
    name: "NewsView",
    components: { NewsAbout, ChevronRight, NewsShort, Footer, Loader, SideBarHeadingsNoUrl },
    setup() { 
    const newsLimit = 10
    let loadIndex = 1
    const newsFeed = ref([null])
    const error = ref(null)
    const isLoadMore = ref(false)
    const displayNewsList = ref([null])
    
    const load = async () => {
      
        axios.get('/api/news-items').then((response) => {
            newsFeed.value = response.data
        }).catch((err) => {
        error.value = err.message
        console.log(error.value)
        })
    }

    const displayNews = () => {
            if(newsFeed.value) {
                if(newsFeed.value.length) {
                    if(newsFeed.value.length > loadIndex * newsLimit) {
                        displayNewsList.value = newsFeed.value.slice(0, loadIndex * newsLimit)
                        isLoadMore.value = true
                    } else {
                        displayNewsList.value = newsFeed.value
                        isLoadMore.value = false
                    }
                } else {
                    displayNewsList.value = []
                    isLoadMore.value = false
                }
            } else {
                displayNewsList.value = []
                isLoadMore.value = false
            }
        }

    const loadMore = () => {
            if(newsFeed.value.length) {
                if(loadIndex < (newsFeed.value.length / newsLimit)) {
                    loadIndex = loadIndex + 1
                    displayNews()
                } 
            } else
            isLoadMore.value = false
    }

    load().then(() => { displayNews() })

    onMounted(() => {
        load();
    })

    
    return { newsFeed, error, displayNewsList, loadMore, isLoadMore }
  }
}

</script>

<style>

.newsfeed-timeline {
    min-height: 100vh; 
    display: flex;
    align-items: center;
    flex-direction: column;
}

.newsfeed-timeline .long-blue-button {
    margin-top: 2rem;
}

.newsfeed-timeline a {
    text-decoration: none;
}

.newsfeed-timeline a.router-link-active {
    text-decoration: none;
}


</style>