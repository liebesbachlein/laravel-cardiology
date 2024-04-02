<template>
    <div class="site-content">
      <div class="site-content-in">
        <div class="patients multi-page">
          <div class="breadcrumbs-box">
                      <div class="breadcrumb-past">
                          <router-link to="/">Главная</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                      <div class="breadcrumb-now">
                        <router-link :to="{name: 'PatientsView', params: {id: 1}}" @click="pageNum = 1">Пациентам</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                  </div>
        
  
        <div class="multi-page-box">
          <div class="page-side">
            <div class="page-side-box">
              <router-link :to="{name: 'PatientsView', params: {id: 1}}">
                <SideBarHeadingsNoUrl heading="Полезная информация" :isActive="pageNum == 1" @about-nav-click="pageNum = 1"/>
              </router-link>
              <router-link :to="{name: 'PatientsView', params: {id: 2}}">
                <SideBarHeadingsNoUrl heading="Частные вопросы" :isActive="pageNum == 2" @about-nav-click="pageNum = 2"/>
              </router-link>
              <router-link :to="{name: 'PatientsView', params: {id: 3}}">
                <SideBarHeadingsNoUrl heading="Обратиться к специалисту" :isActive="pageNum == 3" @about-nav-click="pageNum = 3"/>
              </router-link>
            </div>
          </div>
  
          <div class="multi-page-content">
            
            <div v-if="pageNum == 2 ">
              <PatientsQA/>
            </div>
            <div v-else-if="pageNum == 3">
              <PatientsAsk/>
            </div>
            <div v-else>
              <PatientsInfo/>
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
  import PatientsAsk from './PatientsAsk.vue';
  import PatientsQA from './PatientsQA.vue';
  import PatientsInfo from './PatientsInfo.vue';
  import Footer from '@/components/Footer.vue';
  import { ref, computed } from 'vue';
  import { useRoute } from 'vue-router';
  
  export default {
    name: 'PatientsView',
    components: {Footer, SideBarHeadingsNoUrl, ChevronRight, PatientsQA, PatientsAsk, PatientsInfo},
    setup() {
      const route = useRoute()
    const pageNum = computed(() => route.params.id)

    return { pageNum }
    }
  }
  </script>
  
