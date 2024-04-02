<template>
<div class="stats-carousel">

<div class="chevron-tap" @click="clickBackward">
    <ChevronLeft color="blue" />
    </div>    

    <Transition name="slider-quick" mode="out-in">
    <div class="stats-item" v-if="pageNum == 1">
        <div class="stats-header">
            1 МЛРД
        </div>
        <div class="stats-bottom">
            — людей на земле страдает от гипертонии
        </div>
    </div>
   

    <div class="stats-item" v-else-if="pageNum == 2">
        <div class="stats-header">
            9,4 МЛН
        </div>
        <div class="stats-bottom">
            — случаев смерти в мире ежегодно из-за осложнения гипертонии
        </div>
    </div>

    <div class="stats-item" v-else-if="pageNum == 3">
        <div class="stats-header">
            40%
        </div>
        <div class="stats-bottom">
            — которой среди взрослого населения
        </div>
    </div>

    <div class="stats-item" v-else-if="pageNum == 4">
        <div class="stats-header">
            45%
        </div>
        <div class="stats-bottom">
            — смертных случаев приходится на долю гипертонии
        </div>
    </div>
</Transition>
    <div class="chevron-tap"  @click="clickForward">
    <ChevronRight color="blue"/>
    </div>
</div>
</template>

<script>
import ChevronLeft from '@/components/ChevronLeft.vue';
import ChevronRight from '@/components/ChevronRight.vue';
import { ref } from 'vue';

export default {
    components: {ChevronLeft, ChevronRight},
    setup() {
        const factsNum = 4
        const pageNum = ref(1)

        const clickForward = () => {
            if (pageNum.value == factsNum) {
                pageNum.value = 1
            } else {
                pageNum.value++
            }
        }

        const clickBackward = () => {
            if (pageNum.value == 1) {
                pageNum.value = factsNum
            } else {
                pageNum.value--
            }
        }

        return {pageNum, clickBackward, clickForward}

    }
}

</script>

<style>

@media only screen and (max-width: 769px) {

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

</style>