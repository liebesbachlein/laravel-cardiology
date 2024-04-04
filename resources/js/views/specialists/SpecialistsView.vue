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
                        <router-link :to="{name: 'SpecialistsView', params: {id: routeNames[0][1]}}" @click="pageNum = 0">Специалистам</router-link>
                      </div>
                      <ChevronRight color="grey"/>
                  </div>
        
  
        <div class="multi-page-box">
          <div class="page-side">
            <div class="page-side-box">
              <router-link v-for="routeName, i in routeNames" :key="i" :to="{name: 'SpecialistsView', params: {id: routeName[1]}}" >
                <SideBarHeadingsNoUrl :heading="routeName[0]" :isActive="pageNum == i" @about-nav-click="pageNum = i"/>
              </router-link>
            </div>
          </div>
  
          <div class="multi-page-content">
  
            
            <div v-if="pageNum == 1">
              <SpecialistsResources/>
            </div>
            <div v-else-if="pageNum == 2">
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
      const routeNames = [['Членство', 'membership'], ['Ресурсы', 'resources'], ['Заяка на обучение', 'education']];
    const routeMap = new Map([
      ['membership', 0],
      ['resources', 1],
      ['education', 2],
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
  
