<template>
    <div class="poster poster6">
        <div class="poster-inner">
        
        <div class="header1">
            <div>Научно-практическая конференция</div>
            <div>Многогранная гипертония</div>
            <div class="poster-city"><img src="@/assets/address-white.svg">              
                Отель "Kazzhol Park Almaty", ул. Наурызбай батыра, 108, Алматы</div>
            <div class="poster-date"><img src="@/assets/time.svg">17 мая</div>
            <a class="poster-button" tag="div" href="https://ahcvp.kz/">
                Зарегистрироваться →</a>
        </div>
    
        </div>
        
    </div>
    
    </template>
    
    
<script setup>

const emits = defineEmits(['lightMode, darkMode'])
emits('darkMode')

</script>
    
<style>
    
    .poster6 .poster-button {
        width: 13rem;
    }
    .poster6 {
        background-image: url('/covers/cover25-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster6 .poster-inner {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster6 .header1 {
        width: 90%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    .poster6 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.125rem;
        font-weight: 400;
        color: #FFFF;
    }
    
    .poster6 .header1 div:nth-child(2){
        font-family: var(--tenor-font);
        font-size: 2.5rem;
        font-weight: 400;
        color: #FFFF;
        margin-bottom: 1rem;
        
    }
    
    
    
    .poster6 .poster-button {
        margin-top: 1rem;
    }
    
    
    @media only screen and (min-width: 1024px) {
    

    
    .poster6 {
        background-image: url('/covers/cover25.jpg');
    }
    .poster6 .poster-inner {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster6 .header1 {
        width: 50%;
    }
    
    .poster6 .header1 div:nth-child(1){
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .poster6 .header1 div:nth-child(2){
        margin: 0;
        font-size: 4rem;
    }
    
    
    
    }
    
    </style>
    
    

