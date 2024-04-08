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
                        <router-link to="/admin/dashboard/membership-list">Список кандидатов</router-link>
                    </div>
                </div>

                <div class="multi-page-box">
                    <div class="newsfeed-timeline multi-page-content">
                        <div v-if="error">
                            <h3>Произошла ошибка</h3>
                            <h3>{{ error }}</h3>
                        </div>
                        <div v-else-if="feed.length > 0" style="width: 100%">
                            <div v-for="item in feed" :key="item? item.id : null" style="width: 100%">
                                <div v-if="item? item.id : null" style="width: 100%">
                                    <AdminMembershipShort :item="item? item : null"/>
                                </div>
                            </div>
                        </div>
                        <div v-else>Нет кандидатов ...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ChevronRight from '@/components/ChevronRight.vue';
import LoaderCircle from '@/components/LoaderCircle.vue';
import AdminMembershipShort from './AdminMembershipShort.vue';
import axios from 'axios';

import { ref, computed, onMounted } from 'vue';

export default {
    name: "AdminMembershipView",
    components: {LoaderCircle, ChevronRight, AdminMembershipShort },
    setup() { 
    const feed = ref([null])
    const error = ref(null)
    
    const load = async () => {
      
        axios.get('/api/membership-items').then((response) => {
            feed.value = response.data
        }).catch((err) => {
        error.value = err.message
        console.log(error.value)
        })
    }



    load()

    onMounted(() => {
        load();
    })

    
    return { feed, error }
  }
}

</script>

<style>


.admin-add-button {
    margin-bottom: 2rem;
}

</style>