<template>

    <HomeHeader title="Глобальная статистика"/>

    <div class="stats-carousel" v-if="mobile">

        <div class="chevron-tap" @click="clickBackward">
            <ChevronLeft color="blue" />
        </div>    

        <Transition  name="slider-quick" mode="out-in">
            <div class="stats-item" @touchstart="storeX" @touchmove="touchUpdateCover">
                <div class="stats-header">
                    {{ data[pageNum].header }}
                </div>
                <div class="stats-bottom">
                    {{ data[pageNum].info }}
                </div>
            </div>
        </Transition>
        <div class="chevron-tap"  @click="clickForward">
            <ChevronRight color="blue"/>
        </div>
    </div>

    <div class="stats" v-else>

        <div v-for="stat in data" class="stats-item">
            <div class="stats-header">{{ stat.header }}</div>
            <div class="stats-bottom">{{ stat.info }}</div>
        </div>

    </div>


</template>

<script setup>
import HomeHeader from './HomeHeader.vue'
import ChevronLeft from '@/components/ChevronLeft.vue';
import ChevronRight from '@/components/ChevronRight.vue';
import { ref, onMounted } from 'vue';

const mobile = ref(null)
const pageNum = ref(0)
const data = [
    {
        header: '1 МЛРД', 
        info: '— людей на земле страдает от гипертонии'
    },
    {
        header: '9,4 МЛН', 
        info: '— случаев смерти в мире ежегодно из-за осложнения гипертонии'
    },
    {
        header: '40%', 
        info: '— которой среди взрослого населения'
    },
    {
        header: '45%', 
        info: '— смертных случаев приходится на долю гипертонии'
    }

]
let startX = null


function storeX (e) {                                   
    startX = e.touches[0].pageX
}

function touchUpdateCover (e) { 
    const movePos = e.touches[0].pageX 
    if (startX && movePos) {        
        if(Math.abs(startX - movePos) < 30) {
            return
        }                         
        if(startX - movePos < 0) {
            clickBackward()
        } else {
            clickForward()
        }
        startX = null
    }

}

const clickForward = () => {
    if (pageNum.value == data.length - 1) {
        pageNum.value = 1
    } else {
        pageNum.value++
    }
}

const clickBackward = () => {
    if (pageNum.value == 0) {
        pageNum.value = data.length - 1
    } else {
        pageNum.value--
    }
}

onMounted(() => {
    mobile.value = window.matchMedia("(max-width: 1023px)").matches

    addEventListener("resize", (event) => {
        mobile.value = window.matchMedia("(max-width: 1023px)").matches
    });
})



</script>

<style>

.stats {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin: 8rem 0 4rem 0;
}

.chevron-tap {
    padding: 4%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    transition: 100ms;
    z-index: 5;
}

.chevron-tap:active {
    background-color: #FFF;
    box-shadow: 2px 2px 4px rgba(15, 30, 104, 0.08), -2px -2px 4px rgba(15, 30, 104, 0.06);
}

.slider-quick-enter-active,
.slider-quick-leave-active {
  transition: opacity 0.5s ease-in-out;
}

.slider-quick-enter-from,
.slider-quick-leave-to {
    opacity: 0;
}

.stats-carousel {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin: 3rem 0;

}

.stats-item {
    width: 17rem;
    max-width: 90%; /*!!!!!!!!!!!*/
    background-color: var(--light-grey);
    box-shadow: 0px 8px 10px rgba(15, 30, 104, 0.08), 0px 0px 6px rgba(15, 30, 104, 0.06);
    border-radius: 0.5rem;
    height: 16.4rem;
    padding: 1rem 1.5rem;
    z-index: 4;
}

.stats-bottom {
    font-size: 1rem;
    color: #454545;
    font-weight: 400;
}

.stats-header {
    margin-bottom: 1rem;
    font-size: 2rem;
    color: var(--component-accent-color2);
    font-family: var(--news-title-font);
    font-weight: 400;
    text-transform: uppercase;
}


@media only screen and (max-width: 1023px) and (min-width: 769px) {

.chevron-tap {
    padding: 4%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    transition: 100ms;
    z-index: 5;
}

.chevron-tap:active {
    background-color: #FFF;
    box-shadow: 2px 2px 4px rgba(15, 30, 104, 0.08), -2px -2px 4px rgba(15, 30, 104, 0.06);
}

.slider-quick-enter-active,
.slider-quick-leave-active {
  transition: opacity 0.2s ease-in-out;
}

.slider-quick-enter-from,
.slider-quick-leave-to {
    opacity: 0;
}

.stats-carousel {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    margin: 3rem 0;

}

.stats-item {
    width: 17rem;
    max-width: 90%; /*!!!!!!!!!!!*/
    background-color: var(--light-grey);
    box-shadow: 0px 8px 10px rgba(15, 30, 104, 0.08), 0px 0px 6px rgba(15, 30, 104, 0.06);
    border-radius: 0.5rem;
    height: 16.4rem;
    padding: 1rem 1.5rem;
    z-index: 4;
}

.stats-bottom {
    font-size: 1rem;
    color: #454545;
    font-weight: 400;
}

.stats-header {
    margin-bottom: 1rem;
    font-size: 2rem;
    color: var(--component-accent-color2);
    font-family: var(--news-title-font);
    font-weight: 400;
}
}


@media only screen and (min-width: 1024px) {
.stats {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin: 3rem 0 6rem 0;
    flex-direction: row;
}

.stats-item {
    width: 20%;
    background-color: var(--light-grey);
    box-shadow: 0px 16px 20px rgba(15, 30, 104, 0.08), 0px 0px 6px rgba(15, 30, 104, 0.06);
    border-radius: 0.5rem;
    height: 16.4rem;
    padding: 2rem 1rem 1rem 1rem;
    z-index: 1;
}

/*
.stats-item:hover {
    box-shadow: 0px 16px 20px rgba(15, 30, 104, 0.08), 0px 0px 6px rgba(15, 30, 104, 0.06);
}
*/
.stats-bottom {
    font-size: 1rem;
    color: #454545;
    font-weight: 400;
}

.stats-header {
    margin-bottom: 1rem;
    font-size: 2rem;
    color: var(--component-accent-color2);
    font-family: var(--news-title-font);
    font-weight: 400;
}
}


</style>