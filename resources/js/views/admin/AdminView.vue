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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminView",
    components: {  },
 
}

</script>

<style>


</style>