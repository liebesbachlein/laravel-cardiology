<template>
  <div class="navbar" id="navBar">
  <div class="navbar-block">

    <div class="navbar-in-block">
      <router-link to="/" tag="div" class="logo-home-container">
        <div class="logo"></div>
      </router-link>
    </div>
  
    <div class="navbar-in-block all-menu-navs">
       
      <div class="navbar-item"  @mouseleave="popAbout = false">
        <Transition name="pop-menu"><AboutPopMenu v-if="popAbout" @closeAbout="popAbout = false"/></Transition>
        <div class="menu-item-round">
          <router-link  @mouseover="popAbout = true" :to="{name: 'AboutView', params: {id: 'us'}}" @click="popAbout = false" :class="{'a-hover': popAbout}">О нас</router-link>
        </div>
      </div>
      <p class="divider">|</p>
    
      <div class="navbar-item"   @mouseleave="popNews = false">
        <div class="menu-item-round">
          <router-link   to="/news/" @mouseover="popNews = true" @click="popNews = false"  :class="{'a-hover': popNews}">Новости</router-link>
        </div>
      </div>
      <p class="divider">|</p>
    
      <div class="navbar-item"   @mouseleave="popSp = false">
        <Transition name="pop-menu"><SpPopMenu v-if="popSp" @closeSp="popSp = false"/></Transition>
        <div class="menu-item-round">
          <router-link   @click="popSp = false" @mouseover="popSp = true"  :to="{name: 'SpecialistsView', params: {id: 'membership'}} " :class="{'a-hover': popSp}">Специалистам</router-link>
        </div>
      </div>
      <p class="divider">|</p>

      <div class="navbar-item"  @mouseleave="popPt = false">
        <Transition name="pop-menu"><PtPopMenu v-if="popPt" @closePt="popPt = false"/></Transition>
        <div class="menu-item-round">
          <router-link  @click="popPt = false" @mouseover="popPt = true"   :to="{name: 'PatientsView', params: {id: 'useful-info'}}" :class="{'a-hover': popPt}">Пациентам</router-link>
        </div>
      </div>
    </div>
    
    <div class="navbar-in-block mobile-side" @click="openSideMenu">
      <div class="mobile-side-menu-box carousel-transition">
        <div class="navbar-side-text carousel-transition">Меню</div>
      </div>
    </div>
  </div>
  <div class="grey-line" id="redLine"></div>
  </div>

</template>

<script>
import AboutPopMenu from './AboutPopMenu.vue';
import SpPopMenu from './SpPopMenu.vue';
import PtPopMenu from './PtPopMenu.vue';


export default {
  components: {AboutPopMenu, SpPopMenu, PtPopMenu},
  props: ['lightMode'],
  data: function () {
    return {
      popAbout: false, 
      popNews: false, 
      popSp: false, 
      popPt: false,
      coverLightMode: this.coverLightMode
    }
  }, 
  methods: {

  openSideMenu() {
    this.$emit('openSideMenu')
  }
}
}

</script>


<style>

.red-line {
    display: block;
    width: 33%;
    border-top: 1px solid var(--header-line);
    margin: 0 auto;
}

.nav-light-mode.home .grey-line {
    border-top: 1px solid #2e3040bb;
}

.home .grey-line {
    display: block;
    width: 80%;
    border-top: 1px solid #ffffff9b;
    margin: 0 auto;
}

.short .grey-line {
    display: block;
    width: 80%;
    border-top: 1px solid #98abcf;
    margin: 0 auto;
}

.navbar {
  display: block;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: 10;
}

.divider, .all-menu-navs, .navbar-item {
  display: none;
}

.short {
  height: 4rem ;
  position: absolute;
}

.home {
  height: 4rem;
}

.navbar-block {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: space-between;
  padding: 0 0.5rem;
}

.navbar-in-block {
    display: flex;
    height: 100%;
    align-items: center;
    flex-direction: row;
}

.home .navbar-block {
  box-shadow: none;
  background-color: transparent;
}

.short .navbar-block {
  background-color: #FFF;
}

.logo {
  display: block;
  background-size: contain;
  background-repeat: no-repeat;
  transition: all 0.1s;
}

.short .logo {
  height: 2.5rem; 
  width: 2.5rem;
  background-image: url("@/assets/logo-square.png");
}

.home .logo {
  height: 2.5rem; 
  width: 2.5rem;
  background-image: url("@/assets/logo-square.png");
}

.mobile-side-menu-box {
  display: flex;
  flex-wrap: nowrap;
  padding: 0.25rem;
  border-radius: 0.125rem;
  border: 1px solid rgba(255, 255, 255, 0.574);
  align-items: center;
}

.short .mobile-side-menu-box {
  border-color: #98abcf;
} 

.nav-light-mode .mobile-side-menu-box  {
  border-color: #2e3040bb;
}

.navbar-side-text {
  font-family: var(--news-title-font);
  font-size: 1rem;
  color: #ffffff;
  text-transform: uppercase;
}

.short .navbar-side-text {
  color: #5b92c9;
}

.nav-light-mode .navbar-side-text {
  color: #212331;
}


@media only screen and (min-width: 1024px) {

.pop-menu-enter-active,
.pop-menu-leave-active {
  transition: all 0.2s ease-out;
  /*max-height: 6rem;*/
}

.pop-menu-enter-from,
.pop-menu-leave-to {
  opacity: 0;
  /*max-height: 0;*/
}

.short .grey-line {
  display: none;
}

.short .divider {
  color: var(--component-accent-color1);
  display: inline
}

.home .divider {
  color: #ffffff9b;
  display: inline
}

.nav-light-mode.home .divider {
  color: #1c1c1c;
}

.short {
  height: 3.375rem;
  position: absolute;
}

.home {
  height: 5rem;
}

.navbar-block {
  padding: 0 3rem;
  box-shadow: 0 2px 4px 0px rgba(193, 209, 229, 0.5);
}

.short .logo {
  height: 2.5rem; 
  width: 2.5rem;
}

.home .logo {
  height: 3.5rem; 
  width: 3.5rem;
}

.navbar-item {
  display: flex;
  height: 100%;
  justify-content: center;
  align-items: flex-end;
  z-index: 12;
  flex-direction: column;
}

.menu-item-round>a {
  font-family: var(--plain-text-font);
  font-size: 1.125rem;
  font-weight: 400;
  text-decoration: none;  
  padding: 0 0.75rem;
}


.menu-item-round>.a-hover {
  text-decoration: overline;
}

.short .menu-item-round>a {
  color: #454545;
  padding: 0 1rem;
}

.home .menu-item-round>a {
  color: #ffffffeb;
  border-radius: 0.5rem;
  font-weight: 600;
}

.nav-light-mode.home .menu-item-round>a {
  color: #2d2d2d;
}

.navbar .menu-item-round {
  margin: 0 1.25rem;
}

.mobile-side {
  display: none;
}
}
</style>