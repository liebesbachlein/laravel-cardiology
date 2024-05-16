<template>
    <div :class="lightMode ? 'semicircle-box semicircle-light-mode' : 'semicircle-box'">
        <div class="semicircle" @click="clickNextLeftCover" @mouseover="clearOldInterval" @mouseleave="setNewInterval">
            ←
        </div>
        <div class="semicircle" @click="clickNextRightCover" @mouseover="clearOldInterval" @mouseleave="setNewInterval">
            →
        </div>
    </div>
    <div class="cover">
        <div class="cover-box">
            <component @touchstart="storeX($event)" @touchmove="touchUpdateCover(i, $event)"  v-for="i in numberOfSlides" :is="components[i - 1]" :id="'cover' + i" :key="i" :class="i == 1 ? 'cover-visible' : 'cover-slide-left'" @lightMode="setLightMode(i - 1)" @darkMode="setDarkMode(i - 1)"/>
            <div class="carousel" >
                <div class="carousel-box" @mouseover="clearOldInterval" @mouseleave="setNewInterval">
                    <div class="indicator" v-for="i in numberOfSlides" :key="i" @click="changeCover(i)" :class="{'indicator-active': controlIndicators[i - 1]}"></div>
                </div>
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
let prevCover = 1
const numberOfSlides = 3
const controlIndicators = ref([]);
const components = [CoverPoster1, CoverPoster2, CoverPoster3, CoverPoster4, CoverPoster5]
const coverModes = []
let inView = false
let startX = null
let startY = null
const lightMode = ref(false)

for (let i = 0; i < numberOfSlides; i++) {
    controlIndicators.value.push(false);
    coverModes.push(false) // false -> dark
}
controlIndicators.value[0] = true

function storeX (e) {                                   
    startX = e.touches[0].pageX
    startY = e.touches[0].pageY
}

function touchUpdateCover (tappedCover, e) { 
    const movePos = e.touches[0].pageX
    const movePosY = e.touches[0].pageY

    if (startX && movePos) {  
        if(Math.abs(startX - movePos) < Math.abs(startY - movePosY)) {
            return
        }                              
        if(startX - movePos < 0) {
            changeCoverNoInterval(nextIndexLeft(tappedCover))
        } else {
            changeCoverNoInterval(nextIndexRight(tappedCover))
        }
        startX = null
    }

}

function clickNextLeftCover () {
    changeCoverNoInterval(nextIndexLeft(prevCover))
}

function clickNextRightCover () {
    changeCoverNoInterval(nextIndexRight(prevCover))
}

function setLightMode(i) {
    coverModes[i] = true
}

function setDarkMode(i) {
    coverModes[i] = false
}

function makeEmit(tappedCover) {
    if(coverModes[tappedCover - 1]) {
        emits('lightMode')
        lightMode.value = true 
    } else {
        emits('darkMode')
        lightMode.value = false 
    }
}

function tuneControlIndicators (tappedIndex) {
    for (let i = 0; i < numberOfSlides; i++) {
        controlIndicators.value[i] = false;
    }
    controlIndicators.value[tappedIndex - 1] = true
}

async function changeCover(tappedCover)  {
    makeEmit(tappedCover)
    clearOldInterval()
    await _changeCover(tappedCover)
    setNewInterval()
}

async function changeCoverNoInterval(tappedCover) {
    makeEmit(tappedCover)
    clearOldInterval()
    await _changeCover(tappedCover)
}

async function _changeCover(tappedCover) {
    if (tappedCover == prevCover) {
        return
    }
    const tappedEl = document.getElementById('cover' + tappedCover)
    tappedEl.classList.remove('cover-slide-transition')
    tappedEl.className = 'poster ' + 'poster' + tappedCover + (prevCover < tappedCover ? ' cover-slide-left' : ' cover-slide-right') // 3 -> 1 prev -> 2 tap (left);  1 -> 3 prev -> 2 tap (right)
    setTimeout(() => {
        tappedEl.className = 'poster ' + 'poster' + tappedCover + ' cover-visible' + ' cover-slide-transition'
        document.getElementById('cover' + prevCover).className = 'poster ' + 'poster' + prevCover + (prevCover < tappedCover ? ' cover-slide-right' : ' cover-slide-left') + ' cover-slide-transition'
        tuneControlIndicators(tappedCover)
        prevCover = tappedCover
    }, 1)


}

function nextIndexRight(i) {
    return i == numberOfSlides ? 1 : i + 1
}


function nextIndexLeft(i) {
    return i == 1 ? numberOfSlides : i - 1
}

onMounted(() => {
        makeEmit(1)
        setNewInterval()

        window.addEventListener('focus', onWindowFocusChange);
        window.addEventListener('blur', onWindowFocusChange);
        window.addEventListener('pageshow', onWindowFocusChange);
        window.addEventListener('pagehide', onWindowFocusChange);
    } 
)

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
    intervalId = setInterval(function () {
        setTimeout(() => {
            makeEmit(nextIndexRight(prevCover))
            _changeCover(nextIndexRight(prevCover));
        }, 
        500)
    }, 9000)
}

function clearOldInterval() {
    if (intervalId) {
        clearInterval(intervalId)
    }
    intervalId = null
}

onUnmounted(() => clearOldInterval)
//return {controlIndicators, changeCover, numberOfSlides, components, setLightMode, setDarkMode}


</script>
    
<style>


    .semicircle-box {
        display: none
    }
    
    .cover {
        width: 100%;
        display: block;
        /*margin-top: 2rem;*/
        margin-bottom: 3rem;
        
    }
    
    .cover-visible, .cover-slide-right, .cover-slide-left {
        position: absolute;
        transition: none;
    }
    
    .cover-visible {
        clip-path: inset(0 0 0 0); 
    }
    
    .cover-slide-right {
        clip-path: inset(0 100% 0 0); 
    }
    
    .cover-slide-left  {
        clip-path: inset(0 0 0 100%); 
    }

    .cover-slide-transition, .home .grey-line {
        transition: all 0.5s ease-out;
    }

    .poster-image {
        position: absolute;
        z-index: -1;
    }
    
    .cover-box {
        display: block;
        text-align: center;
        height: calc(100vw * 16 / 9 * 0.9);
        position: relative;
        width: 100%;
        right: 0;
    }
    
    .carousel {
        display: block;
        max-height: 4rem;
        justify-content: center;
        position: absolute;
        bottom: 5%;
        width: 100%;
        z-index: 100;
    }
    
    .carousel-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .indicator, .indicator-active {
        display: inline-block;
        margin: 0 1rem;
        width: 10px;
        height: 10px;
        border-radius: 5px;
        background-color: #8198bc;
        cursor: pointer;
    }
    
    .indicator-active {
        background-color: var(--component-accent-color1);
    }
    
    @media only screen and (min-width: 768px) {
        .cover-box {
            height: calc(100vw * 4 / 3);
        }
    }
    
    @media only screen and (min-width: 1024px) {
    
    .cover-box {
        min-height: calc(100vw * 8 / 16);
        height: 100vh;
    }
    
    .carousel {
        bottom: 5%;
    
    }

    .semicircle-box {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        min-height: calc(100vw * 8 / 16);
        height: 100vh;
        width: 100%;
        position: absolute;
        z-index: 1;
    }

    .semicircle {
        font-size: 3rem;
        color: #ffffffce;
        cursor: pointer;
    }

    .semicircle-light-mode .semicircle {
        color: #000000c0;
    }

    .semicircle-box>div:nth-child(1) {
        padding-left: 1rem;
    }

    .semicircle-box>div:nth-child(2) {
        padding-right: 1rem;
    }
    
    }
    </style>