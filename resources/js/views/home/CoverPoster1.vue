<template>
    <div class="poster poster1">
        <div class="box">
        
        <div class="header1">
            <div>Научно-практическая конференция</div>
            <div>Многогранная гипертония</div>
            <div class="poster-city"><img src="@/assets/address-white.svg">              
                Отель "Kazzhol Park Almaty", ул. Наурызбай батыра, 108, Алматы</div>
            <div class="poster-date"><img src="@/assets/time.svg">17 мая</div>
            <a class="cover-button" tag="div" href="https://ahcvp.kz/">
                Зарегистрироваться →</a>
        </div>
    
        </div>
        
    </div>
    
    </template>
    
    
<script setup>

const emits = defineEmits(['lightMode'])
emits('darkMode')

</script>
    
<style>
    
    .poster1 .cover-button {
        width: 13rem;
    }
    .poster1 {
        background-image: url('/covers/cover25-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster1 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster1 .header1 {
        width: 90%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    .poster1 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.125rem;
        font-weight: 400;
        color: #FFFF;
    }
    
    .poster1 .header1 div:nth-child(2){
        font-family: var(--tenor-font);
        font-size: 2.5rem;
        font-weight: 400;
        color: #FFFF;
        margin-bottom: 1rem;
        
    }
    
    
    
    .poster1 .cover-button {
        margin-top: 1rem;
    }
    
    
    @media only screen and (min-width: 1024px) {
    

    
    .poster1 {
        background-image: url('/covers/cover25.jpg');
    }
    .poster1 .box {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster1 .header1 {
        width: 50%;
    }
    
    .poster1 .header1 div:nth-child(1){
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .poster1 .header1 div:nth-child(2){
        margin: 0;
        font-size: 4rem;
    }
    
    
    
    }
    
    </style>
    
    

