<template>
  <div class="site-content">
    <div class="site-content-in">
      <div class="multi-page">
        <div class="breadcrumbs-box">
          <div class="breadcrumb-past">
              <router-link to="/">Главная</router-link>
          </div>
          <ChevronRight color="grey"/>
          <div class="breadcrumb-now">
            <router-link :to="{name: 'AboutView', params: {id: 1}}" @click="pageNum = 1">О нас</router-link>
          </div>
          <ChevronRight color="grey"/>
        </div>
      

      <div class="multi-page-box">
        <div class="page-side">
          <div class="page-side-box">
            <router-link :to="{name: 'AboutView', params: {id: 1}}">
              <SideBarHeadingsNoUrl heading="Об обществе" :isActive="pageNum == 1" @about-nav-click="pageNum = 1"/>
            </router-link>
            <router-link :to="{name: 'AboutView', params: {id: 2}}">
              <SideBarHeadingsNoUrl heading="Руководство" :isActive="pageNum == 2" @about-nav-click="pageNum = 2"/>
            </router-link>
            <router-link :to="{name: 'AboutView', params: {id: 3}}">
              <SideBarHeadingsNoUrl heading="Галерея" :isActive="pageNum == 3" @about-nav-click="pageNum = 3"/>
            </router-link>
            <router-link :to="{name: 'AboutView', params: {id: 4}}">
              <SideBarHeadingsNoUrl heading="Контакты" :isActive="pageNum == 4" @about-nav-click="pageNum = 4"/>
            </router-link>
          </div>
        </div>

        <div class="multi-page-content">

          
          <div v-if="pageNum == 2">
            <AboutHead/>
          </div>
          <div v-else-if="pageNum == 3">
            <AboutGallery/>
          </div>
          <div v-else-if="pageNum == 4">
            <AboutContacts/>
          </div>
          <div v-else>
            <AboutSociety/>
          </div>


        </div>
        
      </div>

    </div>
    </div>
    <Footer/>
  </div>
</template>

<script>

import SideBarHeadingsNoUrl from '@/components/SideBarHeadingsNoUrl.vue';
import ChevronRight from '@/components/ChevronRight.vue';
import AboutContacts from './AboutContacts.vue';
import AboutGallery from './AboutGallery.vue';
import AboutHead from './AboutHead.vue';
import AboutSociety from './AboutSociety.vue';
import Footer from '@/components/Footer.vue';
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';

export default {
  name: 'AboutView',
  components: {Footer, SideBarHeadingsNoUrl, ChevronRight, AboutSociety, AboutHead, AboutGallery, AboutContacts},
  setup() {
    const route = useRoute()
    const pageNum = computed(() => route.params.id)

    return { pageNum }
  }
}
</script>

<style>

.multi-page {
    width: 100%;
    padding: 0 1rem;
}

.multi-page-box {
    display: flex;
    width: 100%;
    justify-content: space-between;
}

.page-side {
  display: none
}

.page-side-box {
  display: none;
}

.multi-page-content {
  width: 100%;
  margin-bottom: 8.5rem;
  
}


@media only screen and (min-width: 768px){

.multi-page {
    width: 100%;
    padding: 0 2rem;
}
}

@media only screen and (min-width: 1024px) {

.multi-page {
    width: 100%;
    padding: 0;
}

.page-side {
  width: 23%;
  display: block;
}

.page-side-box {
  margin-top: 0.5rem;
  display: inline-block;
  width: 100%;
  height: auto;
  background-color: #e4f0ff;
  padding: 1.5rem 1.25rem 1rem 1.25rem;
}

.newsfeed .page-side-box, .newsabout .page-side-box {
  margin-top: 0;
}

.multi-page-content {
  width: 70%;
  
}
}


</style>