<template>
  
    <NavBar v-if="!$route.meta.hideNavbar" :class="shortMenu ? 'short' : isLightMode ? 'home nav-light-mode' : 'home'" @openSideMenu="sideMenu = true"/>
    <Transition name="side-pop-menu">
    <PopMenuMobile v-if="!$route.meta.hideNavbar && sideMenu && mobile" @closeSideMenu="sideMenu = false" />
    </Transition>
    <Transition name="side-pop-backdrop-transition">
      <div v-if="!$route.meta.hideNavbar && sideMenu && mobile" class="side-pop-backdrop"></div>
    </Transition>
    <RouterView @darkMode="lightMode = false" @lightMode="lightMode = true"/>

</template>

<script>
import NavBar from './components/NavBar.vue'
import { RouterView } from 'vue-router'
import PopMenuMobile from './components/PopMenuMobile.vue'

export default {
  name: 'App',
  data: function() {
    return {
      mobile: null, 
      sideMenu: false,
      lightMode: null
    }
  },
  computed: {
    shortMenu() {
      if (this.$route.path === '/' || this.$route.path === '') {
        return false
      } else {
        return true
      }
    },
    isLightMode() {
      /*const navBar = document.getElementById('navBar')

      if(navBar != null) {
        navBar.
      }*/
      return this.lightMode
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

.side-pop-backdrop-transition-enter-active,
.side-pop-backdrop-transition-leave-active {
  transition: all 0.2s ease;
}

.side-pop-backdrop-transition-enter-from,
.side-pop-backdrop-transition-leave-to {
  opacity: 0;
}

.side-pop-backdrop {
  position: fixed;
  min-height: 100vh;
  width: 100%;
  background-color: #2a2c37c8;
  z-index: 100;
}

</style>



