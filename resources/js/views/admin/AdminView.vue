<template>
    <div class="site-content admin">
        <div class="site-content-in">
            <div class="newsfeed multi-page">
                
                <div class="breadcrumbs-box">
                    <div class="subpage-title">
                        Панель администратора
                    </div>
                </div>

                <div class="multi-page-box">
                    <div class="newsfeed-timeline multi-page-content">
                        <router-link to="/admin/dashboard/news-list" class="newsshort-admin" tag="div">
                                <div class="newsshort-title">  
                                    База данных: Новости
                                </div>
                                <div class="newsshort-summary">
                                    Создать новость, изменить существующую новость, удалить новость 
                                </div>
                        </router-link>
                        <router-link to="/admin/dashboard/membership-list" class="newsshort-admin" tag="div">
                                <div class="newsshort-title">  
                                    База данных: Заявки на членство
                                </div>
                                <div class="newsshort-summary">
                                    Рассмотреть заявку, отклонить или одобрить заявку, убрать заявку 
                                </div>
                        </router-link>
                        <div class="short-blue-button admin-add-button" tag="div" style="margin: 0 0 0 auto" @click="logOut">
                            Выйти
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: "AdminView",
    components: {  },
    methods: {
        logOut() {
            axios.post('/users/logout').then((response) => {
            if(response.status != 200) {
              throw Error('Произошла ошибка')
            }
            this.$router.push({ path: '/' }) 
          }).catch((err) => {          
            console.log(err.message)
          })
        }
    }
 
}

</script>

<style>


</style>