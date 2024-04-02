<template>
    <NavBar v-if="!$route.meta.hideNavbar" :class="shortMenu ? 'short' : 'home'" @openSideMenu="sideMenu = true"/>
    
    <Transition name="side-pop-menu">
    <PopMenuMobile v-if="!$route.meta.hideNavbar && sideMenu && mobile" @closeSideMenu="sideMenu = false" />
    </Transition>
    <RouterView/>
</template>

<script>
import NavBar from './components/NavBar.vue'
import {RouterView } from 'vue-router'
import PopMenuMobile from './components/PopMenuMobile.vue'

export default {
  name: 'App',
  data: function() {
    return {
      mobile: null, 
      sideMenu: false
    }
  },
  computed: {
    shortMenu() {
      if (this.$route.path === '/' || this.$route.path === '') {
        return false
      } else {
        return true
      }
    }
  },
  mounted() {
    addEventListener("resize", (event) => {
        this.mobile = window.matchMedia("(max-width: 1023px)").matches
    });

    this.mobile = window.matchMedia("(max-width: 1023px)").matches

    addEventListener("resize", (event) => {
        this.mobile = window.matchMedia("(max-width: 1023px)").matches
    });
    
  },
  components: {
    NavBar, PopMenuMobile
}
}
</script>


<style>
.side-pop-menu-enter-active,
.side-pop-menu-leave-active {
  transition: all 0.2s ease;
  max-height: 80%;
}

.side-pop-menu-enter-from,
.side-pop-menu-leave-to {
  opacity: 0;
  width: 0;
}

</style>



