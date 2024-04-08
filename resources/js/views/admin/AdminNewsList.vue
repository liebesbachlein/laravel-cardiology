<template>
    <div class="site-content admin">
        <div class="site-content-in">
            <div class="newsfeed multi-page">
                <div class="breadcrumbs-box">
                    <div class="breadcrumb-past">
                        <router-link to="/admin/dashboard">Панель администратора</router-link>
                    </div>
                    <ChevronRight color="grey"/>
                    <div class="breadcrumb-now">
                        <router-link to="/admin/dashboard/news-list">Список новостей</router-link>
                    </div>
                </div>

                <div class="multi-page-box">
                    <div class="newsfeed-timeline multi-page-content">
                        <router-link to="/admin/news-list/add-news" class="short-blue-button admin-add-button" tag="div">
                            Добавить новость
                        </router-link>
                        <div v-if="error">
                            <h3>Произошла ошибка</h3>
                            <h3>{{ error }}</h3>
                        </div>
                        <div v-else-if="newsFeed.length > 0" style="width: 100%">
                            <div v-for="newsItem in newsFeed" :key="newsItem? newsItem.id : null" style="width: 100%">
                                <div v-if="newsItem? newsItem.id : null" style="width: 100%">
                                    <AdminNewsShort :newsItem="newsItem? newsItem : null"/>
                                </div>
                            </div>
                        </div>
                        <div v-else>Нет новостей ...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ChevronRight from '@/components/ChevronRight.vue';
import LoaderCircle from '@/components/LoaderCircle.vue';
import AdminNewsShort from './AdminNewsShort.vue';
import axios from 'axios';
import { ref, computed, onMounted } from 'vue';

export default {
    name: "AdminNewsView",
    components: {LoaderCircle, ChevronRight, AdminNewsShort },
    setup() { 
    const newsFeed = ref([null])
    const error = ref(null)
    
    const load = async () => {
      
        axios.get('/api/news-items').then((response) => {
            newsFeed.value = response.data
        }).catch((err) => {
        error.value = err.message
        console.log(error.value)
        })
    }



    load()

    onMounted(() => {
        load();
    })

    
    return { newsFeed, error }
  }
}

</script>

<style>


.admin-add-button {
    margin-bottom: 2rem;
}

</style>