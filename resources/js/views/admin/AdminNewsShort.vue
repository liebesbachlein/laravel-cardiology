<template>
    <router-link :to="{name: 'AdminNewsAbout', params: {id: newsItem.id}}" class="newsshort-admin" tag="div">
         <div class="newsshort-phrase-date">
            <div class="newsshort-phrase">
                  {{ newsItem.phrase }}
            </div>
            <div class="newsshort-date">
                  {{ newsItem.date_published }}
            </div>
         </div>
            <div class="newsshort-title">  
                  {{ newsItem.title }}
            </div>
            <div class="newsshort-summary">
                  {{ newsItem.summary }}
            </div>
   </router-link>
</template>

<script>
import AdminNewsAbout from './AdminNewsAbout.vue';

export default {
   props: ['newsItem'], 
   components: {AdminNewsAbout}
 }


</script>

<style>


.newsshort-admin {
   transition: all 0.5s;
   width: 100%;
   display: flex;
   margin-bottom: 1rem;
   flex-direction: column;
   align-items: start;
   padding: 1rem;
   background-color: #FFF;
   border-radius: 0.5rem;
   cursor: pointer;
}


.newsshort-admin .newsshort-title {
   color: #000;
   font-size: 1.5rem;
   font-family: var(--news-title-font);
   font-weight: 400;
   margin-bottom: 0.5rem; 
}


@media only screen and (min-width: 1024px) {


.newsshort-admin:hover {
   box-shadow: 4px 4px 16px rgba(15, 30, 104, 0.02), 4px 4px 16px rgba(15, 30, 104, 0.02);

}

.newsshort-admin:hover .newsshort-title {
   transition: all 0.2s;
   color: var(--component-accent-color1);
}
}

</style>