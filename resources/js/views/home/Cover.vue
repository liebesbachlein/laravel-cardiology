<template>
    <div v-if="numberOfSlides > 1" class="carousel-arrow carousel-arrow-left">
        <div class="carousel-arrow-inner" :class="lightMode 
        ? 'carousel-arrow-light-mode' : ''" 
        @click="reorderLeft()" @mouseover="clearOldInterval" @mouseleave="setNewInterval"/>
    </div>
    <div v-if="numberOfSlides > 1" class="carousel-arrow carousel-arrow-right">
        <div class="carousel-arrow-inner" :class="lightMode 
        ? 'carousel-arrow-light-mode' : ''" 
        @click="reorderRight()" @mouseover="clearOldInterval" @mouseleave="setNewInterval"/>
    </div>
    
    <div class="carousel">
        <div v-if="numberOfSlides > 1" class="carousel-inner">
            <component class="carousel-transition poster-transition" 
            :is="components[numberOfSlides - 1]" :id="`slide${numberOfSlides - 1}add`"
            @lightMode="setLightMode(numberOfSlides - 1)" @darkMode="setDarkMode(numberOfSlides - 1)"/>

            <component class="carousel-transition poster-transition" 
            v-for="i in numberOfSlides" 
            @touchstart="storeXY($event)" 
            @touchmove="touchUpdateCover($event)"
            @touchend="reorderTouch(i - 1)"
            :is="components[i - 1]" :id="`slide${i - 1}`" :key="i - 1" 
            @lightMode="setLightMode(i - 1)" @darkMode="setDarkMode(i - 1)"/>
        
            <component class="carousel-transition poster-transition" 
            :is="components[0]" :id="`slide0add`" 
            @lightMode="setLightMode(0)" @darkMode="setDarkMode(0)"/>
        </div>
        <div v-else>
            <component class="carousel-transition poster-transition" 
            v-for="i in numberOfSlides" 
            :is="components[i - 1]" :id="`slide${i - 1}`" :key="i - 1" 
            @lightMode="setLightMode(i - 1)" @darkMode="setDarkMode(i - 1)"/>
        </div>
        <div v-if="numberOfSlides > 1" class="carousel-nav" >
            <div class="carousel-nav-inner" @mouseover="clearOldInterval"
             @mouseleave="setNewInterval">
                <div class="carousel-button" v-for="i in numberOfSlides" :key="i" 
                @click="reorder(i - 1)" 
                :class="controlIndicators[i - 1] ? 'carousel-button-active' : lightMode ? 'carousel-button-light-mode' : ''"/>
            </div>
        </div> 
    </div>
</template>
            
            
<script setup>
import { onMounted, onUnmounted, ref } from 'vue'
import CoverPoster1 from './CoverPoster1.vue'
import CoverPoster2 from './CoverPoster2.vue'
import CoverPoster3 from './CoverPoster3.vue'
import CoverPoster4 from './CoverPoster4.vue'
import CoverPoster5 from './CoverPoster5.vue'

const emits = defineEmits(['lightMode, darkMode'])
let intervalId = null
const numberOfSlides = 3
const controlIndicators = ref([]);
const components = [
    CoverPoster1, 
    CoverPoster2, 
    CoverPoster3, 
    CoverPoster4, 
    CoverPoster5
                    ]

const coverModes = []
let inView = false
let startX = null
let startY = null
const lightMode = ref(false)
let curPos = 0
let directionToRight = true
let isTouchSwipe = false
let mobile = true
const intervalDuration = 9000

for (let i = 0; i < numberOfSlides; i++) {
    controlIndicators.value.push(false);
    coverModes.push(false) // false -> dark
}
controlIndicators.value[0] = true

function storeXY(e) {                                   
    startX = e.touches[0].pageX
    startY = e.touches[0].pageY
}

function touchUpdateCover(e) { 
    const movePosX = e.touches[0].pageX
    const movePosY = e.touches[0].pageY
    const width = window.screen.width 
    if (startX && movePosX) {  
        
        if(Math.abs(startY - movePosY) > Math.abs(startX - movePosX)) {
            isTouchSwipe = false
            startX = null
            startY = null
            return
        }  

        isTouchSwipe = true
        if((startX - movePosX) > 0) {  // to right
            
            if (curPos == numberOfSlides - 1) {
                document.getElementById(`slide${curPos}`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${curPos}add`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${nextIndexRight(curPos)}add`).style.transform = 
                `translateX(${(1 - (startX - movePosX) / width) * 100}%)`
            } else {
                document.getElementById(`slide${curPos}`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${nextIndexRight(curPos)}`).style.transform = 
                `translateX(${(1 - (startX - movePosX) / width) * 100}%)`
            }
            directionToRight = true
        } else { // to left
            if (curPos == 0) {
                document.getElementById(`slide${curPos}`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${curPos}add`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${nextIndexLeft(curPos)}add`).style.transform = 
                `translateX(${((movePosX - startX)/ width - 1) * 100}%)`
            } else {
                document.getElementById(`slide${curPos}`).style.transform = 
                `translateX(${(movePosX - startX) / width * 100}%)`
                document.getElementById(`slide${nextIndexLeft(curPos)}`).style.transform = 
                `translateX(${((movePosX - startX)/ width - 1) * 100}%)`
            }
            directionToRight = false
        }
    }

}

function setLightMode(i) {
    coverModes[i] = true
}

function setDarkMode(i) {
    coverModes[i] = false
}

function makeEmit(tappedCover) {
    if(coverModes[tappedCover]) {
        emits('lightMode')
        lightMode.value = true 
    } else {
        emits('darkMode')
        lightMode.value = false 
    }
}

function alignCarouselButtons(tappedIndex) {
    for (let i = 0; i < numberOfSlides; i++) {
        controlIndicators.value[i] = false;
    }
    controlIndicators.value[tappedIndex] = true
}

function nextIndexRight(i) {
    return i == numberOfSlides - 1 ? 0 : i + 1
}

function nextIndexLeft(i) {
    return i == 0 ? numberOfSlides - 1 : i - 1
}

onMounted(() => {
    curPos = 0
    mobile = window.matchMedia("(max-width: 1023px)").matches
    if(numberOfSlides > 1) {
        if(mobile) {
            reorder(0)
        } else {
            reorder(0).then(() => setNewInterval())
            window.addEventListener('focus', onWindowFocusChange);
            window.addEventListener('blur', onWindowFocusChange);
            window.addEventListener('pageshow', onWindowFocusChange);
            window.addEventListener('pagehide', onWindowFocusChange); 
        }
    }

    } 
)

function reorderLeft() {
    if(curPos == 0) {

        document.getElementById(`slide${numberOfSlides - 1}add`).style.transform = 
                `translateX(${0}%)`
        document.getElementById(`slide${numberOfSlides - 1}add`).style.zIndex = '2'

        document.getElementById(`slide${numberOfSlides - 1}`).style.zIndex = '1'
        document.getElementById(`slide${numberOfSlides - 1}`).style.transform = 
                `translateX(${0}%)`

        document.getElementById(`slide0`).style.transform = 
                `translateX(${100}%)`
        document.getElementById(`slide0`).style.zIndex = '2'

        reorder(nextIndexLeft(curPos), true)
    } else {
        reorder(nextIndexLeft(curPos))
    }
}

function reorderRight() {
    if(curPos == numberOfSlides - 1) {

        document.getElementById(`slide${0}add`).style.transform = 
                `translateX(${0}%)`
        document.getElementById(`slide${0}add`).style.zIndex = '2'

        document.getElementById(`slide${0}`).style.zIndex = '1'
        document.getElementById(`slide${0}`).style.transform = 
                `translateX(${0}%)`

        document.getElementById(`slide${numberOfSlides - 1}`).style.transform = 
                `translateX(${-100}%)`
        document.getElementById(`slide${numberOfSlides - 1}`).style.zIndex = '2'

        reorder(nextIndexRight(curPos), true)
    } else {
        reorder(nextIndexRight(curPos))
    }
}

function reorderTouch (nextPos) {
    if (isTouchSwipe) { 
        if(directionToRight) {
            if (curPos == numberOfSlides - 1) {
                reorderRight()
            } else {
                reorder(nextIndexRight(nextPos))
            }
        } else {
            if (curPos == 0) {
                reorderLeft()
            } else {
                reorder(nextIndexLeft(nextPos))
            }
        }
        isTouchSwipe = false
    } else {
        reorder(curPos)
    }
}

async function reorder(nextPos, isTimeout = false) {
    makeEmit(nextPos)
    alignCarouselButtons(nextPos)

    const loopPoster = function (nextPos) {
        let posterIndex = 0
        let posterTrans = 0 - nextPos // 4_-1 0_0 1 2 3 4_4 0_5
                                    // 4_-2 0_-1 1_0 0_1 3_2 4_3 0_4

        for(; posterIndex < numberOfSlides; posterIndex++, posterTrans++) {
                document.getElementById(`slide${posterIndex}`).style.transform = 
            `translateX(${posterTrans * 100}%)`

            if (nextPos == posterIndex) {
                document.getElementById(`slide${posterIndex}`).style.zIndex = '2'
                
            } else {
                document.getElementById(`slide${posterIndex}`).style.zIndex = '1'
            }

            if (posterIndex == 0 || posterIndex == numberOfSlides - 1) {
                if (nextPos == posterIndex) {
                    document.getElementById(`slide${posterIndex}add`).style.transform = 
                    `translateX(${posterTrans * 100}%)`
                } else {
                    document.getElementById(`slide${posterIndex}add`).style.transform = 
                    `translateX(${(posterIndex ? (posterTrans - numberOfSlides) : (numberOfSlides + posterTrans)) * 100}%)`
                }   
                document.getElementById(`slide${posterIndex}add`).style.zIndex = '0'
            }
        }
    }

    if (isTimeout == true) {
        setTimeout(() => loopPoster(nextPos), 300)
    } else {
        loopPoster(nextPos)
    }

    curPos = nextPos
    return true
}

function onWindowFocusChange(e) {
    if ({ focus: 1, pageshow: 1 }[e.type]) {
        if (inView) return
        this.tabFocus = true
        inView = true
        if (intervalId == null) {
            setNewInterval()
        }
    } else if (inView) {
        this.tabFocus = !this.tabFocus
        inView = false
        clearOldInterval()
    }
}

async function setNewInterval() {
    if(!mobile && numberOfSlides > 1) {
        intervalId = setInterval(function () {
            setTimeout(() => {
                reorderRight()
            }, 
            500)
        }, intervalDuration)
    }
}

function clearOldInterval() {
    if (intervalId) {
        clearInterval(intervalId)
    }
    intervalId = null
}

onUnmounted(() => clearOldInterval())

</script>
    
<style>

    .carousel, .carousel-inner {
        height: calc(100vw * 16 / 9 * 0.9);
    }

    .carousel {
        position: relative;
        width: 100%;
        display: block;
        margin-bottom: 3rem; 
        
    }

    .carousel-inner {
        overflow: hidden;
        /*display: flex;
        text-align: center;
        flex-wrap: nowrap;*/
        position: relative; 
        /*height: 100%;*/
    }

    .carousel-transition, .home .grey-line {
        transition: all 0.3s ease-out;
    }

    .poster-transition {
        transition: transform 0.3s ease-out;
    }
    
    .carousel-nav {
        width: 100%;
        display: flex;
        height: 3rem;
        justify-content: center;
        align-items: center;
        position: absolute;
        bottom: 1rem;
        z-index: 2;
    }
    
    .carousel-nav-inner {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        
    }
    
    .carousel-button {
        display: inline-block;
        margin: 0 1rem;
        width: 10px;
        height: 10px;
        border-radius: 5px;
        background-color: #ffffff;
        cursor: pointer;
    }
    
    .carousel-button-active {
        background-color: var(--component-accent-color1);
    }

    .carousel-button-light-mode {
        background-color: #505050b3;
    }

    .carousel-arrow {
        display: none;
    }
    
@media only screen and (min-width: 768px) {
    
    .carousel, .carousel-inner {
        height: calc(100vw * 4 / 3);
    }
}
    
@media only screen and (min-width: 1024px) {
    
    .carousel, .carousel-inner {
        min-height: calc(100vw * 8 / 16);
        height: 100vh;
    }

    .carousel-arrow {
        min-height: calc(100vw * 8 / 16);
        height: 100vh;
        display: inline-flex;
        align-items: center;
        position: absolute;
        z-index: 3;
        top: 0;
    }

    .carousel-arrow-inner {
        width: 4rem;
        height: 4rem;
        cursor: pointer;
        background-size: contain;
        background-repeat: no-repeat;
    }

    .carousel-arrow-left {
        left: 0;
        padding-left: 1rem;
    }

    .carousel-arrow-left .carousel-arrow-inner {
        background-image: url('@/assets/arrow-left-white.svg');
    }

    .carousel-arrow-left .carousel-arrow-light-mode {
        background-image: url('@/assets/arrow-left.svg')
    }

    .carousel-arrow-right {
        right: 0;
        padding-right: 1rem;
    }

    .carousel-arrow-right .carousel-arrow-inner {
        background-image: url('@/assets/arrow-right-white.svg');
    }

    .carousel-arrow-right .carousel-arrow-light-mode {
        background-image: url('@/assets/arrow-right.svg')
    }

    .carousel-nav {
        bottom: 2rem;
    }
    
    }
    </style>