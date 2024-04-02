<template>
    <div class="pop-menu">
        <router-link to="/about/1">
  
            <div class="pop-menu-item"  @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Об Обществе</h4>
            </div>
           
        </router-link>
        <router-link to="/about/2">
        
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Руководство</h4>
            </div>
        </router-link>
        <router-link to="/about/3">
        
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Галерея</h4>
            </div>
        </router-link>
        
        <router-link to="/about/4">

            <div class="pop-menu-item" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Контакты</h4>
            </div>
    </router-link>
    </div>

</template>


<script>
import ChevronRight from './ChevronRight.vue';
import ChevronLeft from './ChevronLeft.vue';

export default {
    components: {ChevronRight, ChevronLeft},
    methods: {
        close() {
            this.$emit('closeAbout')
        }
    }
}

</script>
<style>

.pop-menu {
    border-radius: 0 0 0.25rem 0.25rem;
    border-color: var(--header-line);
    border-width: 0 1px 1px 1px;
    border-style: solid;
    background-color: #FFF;
    padding: 0.5rem 1rem;
    z-index: 100;
    width: 16rem;

}

.short .pop-menu {
    position: absolute;
    top: 3.375rem;
    box-shadow: -2px 2px 2px rgba(193, 209, 229, 0.5), 2px 2px 2px rgba(193, 209, 229, 0.5);
}

.home .pop-menu {
    position: absolute;
    top: 5rem; 
}
/*
.pop-menu::before {
    content: "";
    position: absolute;
    height: calc(100% - 1rem);
    width: 1rem;
    background-color: transparent;
    border-radius: 0 0.5rem 0 0;
    border-color: var(--header-line);
    border-width: 1px 1px 0 0;
    border-style: solid;
    bottom: calc(1rem - 1px);
    right: 100%;
    box-shadow: 0.4rem -0.25rem 0 0 #FFF;
}

.pop-menu::after {
    content: "";
    position: absolute;
    height: calc(100% - 1rem);
    width: 1rem;
    background-color: transparent;
    border-radius: 0.5rem 0 0 0;
    border-color: var(--header-line);
    border-width: 1px 0 0 1px;
    border-style: solid;
    bottom: calc(1rem - 1px);
    left: 100%;
    box-shadow: -0.4rem -0.25rem 0 0 #FFF;
}
*/
.pop-menu-item {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    margin: 1rem 0;
}

.pop-menu-item h4 {
    margin-left: 1.5rem;
    text-transform: none;
    font-size: 1.025rem;
    transition: all 0.3s ease;
    font-weight: 400;
}

.pop-menu-item:hover .pop-chev {
    transform: rotate(180deg);
}
</style>