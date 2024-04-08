<template>
    
   <div class="newsshort-admin membership">
      <div class="newsshort-phrase-date">
         <div class="newsshort-phrase">
               ID {{ item.id }}
         </div>
         <div class="newsshort-date">
               {{ daysPassed }} дней с отправки заявки
         </div>
      </div>
         <router-link :to="{name: 'AdminMembershipAbout', params: {id: item.id}}">
            <div class="newsshort-title">  
                  {{ item.last_name }} {{ item.first_name }} {{ item.patro_name }}
            </div>
         </router-link>

         <div class="short-blue-button" @click="acceptMember">
            Принять кандидата
         </div>
   </div>
   
</template>

<script>
import AdminMembershipAbout from './AdminMembershipAbout.vue';

export default {
   props: ['item'], 
   components: {AdminMembershipAbout},
   computed: {
      daysPassed: function() {
         const now = Date.now()
         const date = Date.parse(this.item.created_at);
         return Math.floor((now - date) / ( 1000 * 60 * 60 * 24))
      }
   }
 }


</script>

<style>

.membership  .short-blue-button {
   margin: 0 0 0 auto;
}


@media only screen and (min-width: 1024px) {



.newsshort-admin.membership:hover .newsshort-title {
   color: #000;
}

.newsshort-admin.membership .newsshort-title:hover {
   color: var(--component-accent-color1);
}

}

</style>