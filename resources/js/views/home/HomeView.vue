<template>
  <div class="site-content homeview">
    <Cover @darkMode="darkMode" @lightMode="lightMode"/>
    <div class="site-content-in">
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

<script setup>
import Cover from './Cover.vue';
import NewsTimeline from './NewsTimeline.vue';
import Partners from './Partners.vue';
import Mission from './Mission.vue';
import Footer from '@/components/Footer.vue';
import Stats from './Stats.vue';

const emits = defineEmits(['lightMode', 'darkMode'])

function lightMode() {
  emits('lightMode')
}

function darkMode() {
  emits('darkMode')
}

</script>

<style>

  .site-content {
    position: absolute;
    width: 100%;
    top: 3rem;
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
  } /* MUST BE AT THE VERY BOTTOM */

</style>
