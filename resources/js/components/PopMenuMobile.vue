<template>
<div class="side-pop-menu">

      <div class="navbar short" >
        <div class="navbar-block">
          
          <div class="navbar-in-block">
          <!--
            <router-link to="/">
              <div class="logo"></div>
            </router-link>
          -->
          </div>

          <div class="navbar-in-block mobile-side" @click="closeSideMenu">
            <div class="mobile-side-menu-box">
              
            <img src="@/assets/close.svg">
            <!--<img src="@/assets/three-dots.svg">-->
            </div>
          </div>
        </div>
        <div class="grey-line" id="redLine"></div>
      </div>
    
   
    <div class="side-pop-menu-in-block">
      
      <div class="side-pop-menu-item"  @click ="popAbout = !popAbout">
        
        <div class="side-pop-menu-title" ref="about" id="about">
          О нас
          
        </div>
        <div class="side-pop-menu-details" v-if="popAbout">

          <router-link to="/about/1" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Об Обществе
                <ChevronRight color="blue"/>
            </div>
          </router-link>

          <router-link to="/about/2" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Руководство
                <ChevronRight color="blue"/>
            </div>
          </router-link>
          
          <router-link to="/about/3" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Галерея
                <ChevronRight color="blue"/>
            </div>
          </router-link>

          <router-link to="/about/4" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Контакты
                <ChevronRight color="blue"/>
            </div>
          </router-link>

        </div>
      </div>
    
      
        <router-link class="side-pop-menu-item-single" ref="news" id="news" to="/news/" @click="closeSideMenu">
            <div class="news-item-nav side-pop-menu-title">
              Новости
            </div>
            <ChevronRight color="blue"/>
        </router-link>
     
    
      <div class="side-pop-menu-item" @click ="popSp = !popSp" >
        <div class="side-pop-menu-title" ref="sp" id="sp">
          Специалистам
        </div>

        <div class="side-pop-menu-details" v-if="popSp">
          <router-link to="/specialists/1" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Членство
                <ChevronRight color="blue"/>
            </div>
          </router-link>

          <router-link to="/specialists/2" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Ресурсы
                <ChevronRight color="blue"/>
            </div>
          </router-link>
          
          <router-link to="/specialists/3" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Заявка на обучение
                <ChevronRight color="blue"/>
            </div>
          </router-link>

        </div>
      </div>
    
      <div class="side-pop-menu-item" @click ="popPt = !popPt">
        <div class="side-pop-menu-title" ref="sp" id="sp">
          Пациентам
        </div>

        <div class="side-pop-menu-details" v-if="popPt">
          <router-link to="/patients/1" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Полезная информация
                <ChevronRight color="blue"/>
            </div>
          </router-link>

          <router-link to="/patients/2" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Частные вопросы
                <ChevronRight color="blue"/>
            </div>
          </router-link>
          
          <router-link to="/patients/3" @click="closeSideMenu">
            <div class="sub-pop-item">    
                Обратиться к специалисту
                <ChevronRight color="blue"/>
            </div>
          </router-link>

        </div>
      </div>

    </div>
  
    <div class="pop-lower">

    <div class="add-links-box">
      <router-link to="/specialists/1" class="add-links" @click="closeSideMenu">
        Стать членом Общества
        <ChevronRight color="blue"/>
      </router-link>
      <router-link to="/specialists/3" class="add-links" @click="closeSideMenu">
        Записаться на обучение
        <ChevronRight color="blue"/>
      </router-link>
    </div>

  <div class="red-line" style="width: 75%"></div>

  <div class="pop-nav-info">
    +7 (700) 076 43 54<br>
    Алматы, ул. Жибек Жолы 8, офис 31<br>
    ОО “Общество специалистов по артериальной гипертонии и кардиоваскулярной профилактике”<br>
  </div>
 
</div>
</div>
</template>

<script>
import ChevronRight from './ChevronRight.vue';
import ChevronLeft from './ChevronLeft.vue';

export default {
  components: {ChevronRight, ChevronLeft},
  data: function () {
    return {
      popAbout: false, 
      popNews: false, 
      popSp: false, 
      popPt: false
    }
  }, 
  methods: {
    closeSideMenu() {
      this.$emit('closeSideMenu')
    }
  }, 
  mounted() {
    let mobile = window.matchMedia("(max-width: 1023px)").matches

    addEventListener("resize", (event) => {
        mobile = window.matchMedia("(max-width: 1023px)").matches
    });

    if(mobile == false) {
      this.closeSideMenu()
    }
  }
}

</script>


<style>

  .words-enter-active,
.words-leave-active {
  transition: opacity 0.1s ease;
}

.words-enter-from,
.words-leave-to {
  opacity: 50%;
}

.side-pop-menu {
  min-height: 100vh;
  width: 80%;
  position: fixed;
  top: 0;
  right: 0;  
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  z-index: 9999;
}

.side-pop-menu .navbar-block, .side-pop-menu {
  background-color: #28282B;
}

.side-pop-menu-in-block {
    display: flex;
    height: 100%;
    flex-direction: column;
    margin-top: 3.725rem;
    padding: 2rem 1rem 1rem 1rem;
    justify-content: center;
    align-items: flex-start;
    z-index: 10;
}

.side-pop-menu .add-links-box {
  width: 100%;
  display: flex;
  height: 100%;
  flex-direction: column;
  padding: 2rem 1rem;
  justify-content: center;
  align-items: flex-start;
}

.side-pop-menu .add-links {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin: 0.5rem 0;
  padding: 0.5rem 1rem 0.5rem 0;
  font-size: 1rem;
  padding-left: 0.5rem;
  font-weight: 400;
  color: #454545;
  letter-spacing: 1px;
}

.side-pop-menu-item {
  display: flex;
  height: 100%;
  align-items: flex-start;
  z-index: 12;
  flex-direction: column;
  width: 100%;
  margin: 1rem 0;
  z-index: 10;

}

.side-pop-menu-item-single {
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: space-between;
  z-index: 12;
  flex-direction: row;
  width: 100%;
  margin: 1rem 0;
  padding-right: 1rem;
  z-index: 10;
}

.news-item-nav {
  display: flex;
  align-items: center;
}

.side-pop-menu-title {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
  font-size: 1.375rem;
  padding-left: 0.5rem;
  font-weight: 600;
  color: #898787;
  font-family: var(--messiri-font);
}

.side-pop-menu-details {
  width: 100%;
  padding: 0.25rem 1rem 0 1rem;
}

.sub-pop-item {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: 1rem 0;
  font-size: 1.125rem;
  padding-left: 1rem;
  font-weight: 400;
  color: #655f5f;

}

.pop-nav-info {
  width: 100%;
  display: flex;
  height: 100%;
  flex-direction: column;
  padding: 2rem 1rem 0 1rem;
  justify-content: center;
  align-items: flex-start;
  font-size: 0.925rem;
  font-weight: 400;
  margin: 0.5rem 0.5rem;
  color: #6C6C6C;
}

.side-pop-menu .mobile-side-menu-box {
  border: 1px solid transparent
}

</style>