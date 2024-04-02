<template>
    <div class="poster poster2">
        <div class="box">
        
        <div class="header1">
            <div>Научно-практическая конференция</div>
            <div>Многогранная гипертония</div>
            <div class="poster-city"><img src="@/assets/address-white.svg">              
                Отель "Kazzhol Park Almaty", ул. Наурызбай батыра, 108, Алматы</div>
            <div class="poster-date"><img src="@/assets/time.svg">17 мая</div>
            <router-link class="cover-button" tag="div" to="/news/mnogogrannaya-hypertoniya-may-2024/">
                Читать →</router-link>
        </div>
    
        </div>
        
    </div>
    
    </template>
    
    <script>
    import DateBox from './DateBox.vue';
    
    export default {
        mounted() {
            this.$emit('light');
        },
        components: { DateBox }
    }
    
    </script>
    
    <style>
    
    
    .poster2 {
        background-image: url('/covers/cover25-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster2 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster2 .header1 {
        width: 90%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    .poster2 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.125rem;
        font-weight: 400;
        color: #FFFF;
    }
    
    .poster2 .header1 div:nth-child(2){
        font-family: var(--tenor-font);
        font-size: 2.5rem;
        font-weight: 400;
        color: #FFFF;
        margin-bottom: 1rem;
        
    }
    
    
    
    .poster2 .cover-button {
        margin-top: 1rem;
    }
    
    
    @media only screen and (min-width: 1024px) {
    

    
    .poster2 {
        background-image: url('/covers/cover25.jpg');
    }
    .poster2 .box {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster2 .header1 {
        width: 50%;
    }
    
    .poster2 .header1 div:nth-child(1){
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .poster2 .header1 div:nth-child(2){
        margin: 0;
        font-size: 4rem;
    }
    
    
    
    }
    
    </style>
    
    