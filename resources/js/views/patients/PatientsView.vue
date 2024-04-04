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
                        <router-link :to="{name: 'PatientsView', params: {id: routeNames[0][1]}}" @click="pageNum = 0">Пациентам</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                  </div>
        
  
        <div class="multi-page-box">
          <div class="page-side">
            <div class="page-side-box">
              <router-link v-for="routeName, i in routeNames" :key="i" :to="{name: 'PatientsView', params: {id: routeName[1]}}" >
              <SideBarHeadingsNoUrl :heading="routeName[0]" :isActive="pageNum == i" @about-nav-click="pageNum = i"/>
            </router-link>
            </div>
          </div>
  
          <div class="multi-page-content">
            
            <div v-if="pageNum == 1">
              <PatientsQA/>
            </div>
            <div v-else-if="pageNum == 2">
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
      const routeNames = [['Полезная информация', 'useful-info'], ['Частные вопросы', 'frequent-questions'], ['Обратиться к специалисту', 'ask-specialist']];
    const routeMap = new Map([
      ['useful-info', 0],
      ['frequent-questions', 1],
      ['ask-specialist', 2],
  ])
    const route = useRoute()
    const isRoute = ref(true)

    const pageNum = computed(() => { 
      const res = routeMap.get(route.params.id)
      if (res == undefined) {
        isRoute.value = false
        return 0
      } else {
        return res;
      }
    })

    return { pageNum, isRoute, routeNames }
    }
  }
  </script>
  
