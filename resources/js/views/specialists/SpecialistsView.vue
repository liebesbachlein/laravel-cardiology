<template>
    <div class="site-content">
      <div class="site-content-in">
        <div class="specialists multi-page">
          <div class="breadcrumbs-box">
                      <div class="breadcrumb-past">
                          <router-link to="/">Главная</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                      <div class="breadcrumb-now">
                        <router-link :to="{name: 'SpecialistsView', params: {id: 1}}" @click="pageNum = 1">Специалистам</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                  </div>
        
  
        <div class="multi-page-box">
          <div class="page-side">
            <div class="page-side-box">
              <router-link :to="{name: 'SpecialistsView', params: {id: 1}}">
                <SideBarHeadingsNoUrl heading="Членство" :isActive="pageNum == 1" @about-nav-click="pageNum = 1"/>
              </router-link>
              <router-link :to="{name: 'SpecialistsView', params: {id: 2}}">
                <SideBarHeadingsNoUrl heading="Ресурсы" :isActive="pageNum == 2" @about-nav-click="pageNum = 2"/>
              </router-link>
              <router-link :to="{name: 'SpecialistsView', params: {id: 3}}">
                <SideBarHeadingsNoUrl heading="Заяка на обучение" :isActive="pageNum == 3" @about-nav-click="pageNum = 3"/>
              </router-link>
            </div>
          </div>
  
          <div class="multi-page-content">
  
            
            <div v-if="pageNum == 2">
              <SpecialistsResources/>
            </div>
            <div v-else-if="pageNum == 3">
              <SpecialistsEducation/>
            </div>
            <div v-else>
              <SpecialistsMembership/>
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
  import SpecialistsMembership from './SpecialistsMembership.vue';
  import SpecialistsEducation from './SpecialistsEducation.vue';
  import SpecialistsResources from './SpecialistsResources.vue';
  import Footer from '@/components/Footer.vue';
  import { ref, computed } from 'vue';
  import { useRoute } from 'vue-router';
  
  export default {
    name: 'AboutView',
    components: {Footer, SideBarHeadingsNoUrl, ChevronRight, SpecialistsMembership, SpecialistsEducation, SpecialistsResources},
    setup() {
      const route = useRoute()
    const pageNum = computed(() => route.params.id)

    return { pageNum }
    }
  }
  </script>
  
