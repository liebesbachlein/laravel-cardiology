<template>
  <div class="site-content homeview"> <!--#FDFAFF-->
    <Cover/>
    <div class="site-content-in">
      <!--<div class="home-us">Мы — Общество специалистов по </div>-->
      <Stats/>
    </div>
      <NewsTimeline/>
    <div class="site-content-in">
      <Partners/>
    </div>
    <Mission/>
    <Footer/>
  </div>
</template>

<script>
import Cover from './Cover.vue';
import NewsTimeline from './NewsTimeline.vue';
import Partners from './Partners.vue';
import Mission from './Mission.vue';
import Footer from '@/components/Footer.vue';
import Stats from './Stats.vue';

export default {
  
  name: 'HomeView',
  components: {Cover, NewsTimeline, Partners, Mission, Footer, Stats},

}
</script>

<style>

  .site-content {
    position: absolute;
    width: 100%;
    top: 4rem;
    right: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  

  .site-content-in {
    width: 100%;
  }

@media only screen and (min-width: 1024px) {

  .site-content {
    top: 3.375rem;
  }

  .site-content-in {
    width: 84%;
    margin: 0 auto; 
  }
}

.homeview {
    top: 0;
  } /* MUST BE ON THE VERY BOTTOM */

</style>
