<template>

    <div class="cover">
    
        <div class="cover-box">
            <!--
            <div class="semicircle-box">
                <div class="semicircle-left">
                    <img src="@/assets/left-arrow.svg">
                </div>
            </div>
            <div class="semicircle-box">
                <div class="semicircle-right">
                    <img src="@/assets/right-arrow.svg">
                </div>
            </div>
            -->
                <CoverPoster1 id="cover1" class="zindex1"/>
                <CoverPoster2 id="cover2" class="zindex2-next"/>
                <CoverPoster3 id="cover3" class="zindex2-next"/>
                <div class="carousel">
                <div class="carousel-box">
                    <div class="indicator" @click="changeCover(1)" :class="{'indicator-active': showCover1}"></div>
                    <div class="indicator" @click="changeCover(2)" :class="{'indicator-active': showCover2}"></div>
                    <div class="indicator" @click="changeCover(3)" :class="{'indicator-active': showCover3}"></div>
                </div>
            </div> 
        </div>
    </div>
    </template>
    
    <script>
    import { ref } from 'vue'
    import CoverPoster1 from './CoverPoster1.vue'
    import CoverPoster2 from './CoverPoster2.vue'
    import CoverPoster3 from './CoverPoster3.vue'
    
    
    export default {
        components: {CoverPoster1, CoverPoster2, CoverPoster3},
    
        setup() {
            const showCover1 = ref(true)
            const showCover2 = ref(false)
            const showCover3 = ref(false)
            let index = 1
    
            const changeCover = (currentCover) => {
                if (currentCover == 1 ) {
                    if (index == 3) {
                        document.getElementById('cover' + index).className ='poster ' + 'poster' + index + ' zindex2-now'
                        index = 1
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexLeft(index)).className = 'poster ' + 'poster' + nextIndexLeft(index) + ' zindex2-next'
                    } else {
                        document.getElementById('cover' + index).className ='poster ' + 'poster' + index + ' zindex3-now'
                        index = 1
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexRight(index)).className = 'poster ' + 'poster' + nextIndexRight(index) + ' zindex3-next'
                    }
    
                    showCover1.value = true
                    showCover2.value = false
                    showCover3.value = false
    
                } else if (currentCover == 2) {
                    if (index == 1) {
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex2-now'
                        index = 2
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexLeft(index)).className = 'poster ' + 'poster' + nextIndexLeft(index) + ' zindex2-next'
                    } else {
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex3-now'
                        index = 2
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexRight(index)).className = 'poster ' + 'poster' + nextIndexRight(index) + ' zindex3-next'
                    }
                    showCover1.value = false
                    showCover2.value = true
                    showCover3.value = false
                    
                } else if (currentCover == 3){
                    if(index == 2) {
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex2-now'
                        index = 3
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexLeft(index)).className = 'poster ' + 'poster' + nextIndexLeft(index) + ' zindex2-next'
                    } else {
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex3-now'
                        index = 3
                        document.getElementById('cover' + index).className = 'poster ' + 'poster' + index + ' zindex1'
                        document.getElementById('cover' + nextIndexRight(index)).className = 'poster ' + 'poster' + nextIndexRight(index) + ' zindex3-next'
    
                    }
                    showCover1.value = false
                    showCover2.value = false
                    showCover3.value = true
                }
            }
    
            const nextIndexLeft = function(i) {
                if (i == 1) {
                    return 2
                } else if (i == 2) { 
                    return 3
                } else if (i == 3) {
                    return 1
                }
            }
    
            const nextIndexRight = function(i) {
                if (i == 1) {
                    return 3
                } else if (i == 2) { 
                    return 1
                } else if (i == 3) {
                    return 2
                }
            }
    
        
    window.onload = async function () { 
                    
        return setInterval(function () { 
                if (index == 1) {    
                    if( !document.getElementById('cover1') || !document.getElementById('cover2') || !document.getElementById('cover3') ) {
                        return false
                    }
                    setTimeout(() => changeCover(nextIndexLeft(index), 500)); 
                } else if (index == 2) {
                    if( !document.getElementById('cover1') || !document.getElementById('cover2') || !document.getElementById('cover3') ) {
                        return false
                    }
                    setTimeout(() => changeCover(nextIndexLeft(index), 500)); 
                } else if (index == 3){                
                    if( !document.getElementById('cover1') || !document.getElementById('cover2') || !document.getElementById('cover3') ) {
                        return false
                    }
                    setTimeout(() => changeCover(nextIndexLeft(index), 500)); 
                }
                
            }, 10000); 
        }
    
            
        return {showCover1, showCover2, showCover3, changeCover}
    }
    }
    
    </script>
    
    <style>
    
    .cover {
        width: 100%;
        display: block;
        /*margin-top: 2rem;*/
        margin-bottom: 3rem;
        
    }
    
    .zindex1, .zindex2-now, .zindex2-next, .zindex3-now, .zindex3-next {
        position: absolute;
        transition: clip-path 1s ease-in-out;
    }
    
    .zindex1 {
        clip-path: inset(0 0 0 0); 
    }
    
    .zindex2-now {
        clip-path: inset(0 100% 0 0); 
    }
    
    .zindex2-next  {
        clip-path: inset(0 0 0 100%); 
    }
    
    .zindex3-now {
        clip-path: inset(0 0 0 100% ); 
    }
    
    .zindex3-next  {
        clip-path: inset(0 100% 0 0); 
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
        height: calc(100vw * 9 / 16);
    }
    
    .carousel {
        bottom: 10%;
    
    }
    
    }
    </style>