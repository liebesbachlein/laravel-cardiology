<template>
    <div class="poster poster1">
        <div class="poster-inner">   
            <div class="header1">
                <div>Отчет с научно-практической конференции</div>
                <div>Многогранная гипертония</div>
                <div>Мероприятие было приурочено к Всемирному дню борьбы с артериальной гипертонией и прошло при поддержке Европейского Общества Гипертонии (ESH) и Всемирной Федерации Сердца (WHF)</div>
                <router-link class="poster-button" tag="div" to="/news/proshla-konf-mnogogran-2024-5/">
                    Читать →</router-link>
            </div>
        </div>
    </div>
</template>
<script setup>

const emits = defineEmits(['lightMode', 'darkMode'])
emits('darkMode')

</script>
    
<style>
    
    .poster1 {
        background-image: url('/covers/cover31-mobile.jpg');
        padding: 0 1rem;
    }

    .poster1 .poster-button {
        width: 13rem;
    }
    
    .poster1 .poster-inner {
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
        font-family: var(--tenor-font);
    }


    .poster1 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.25rem;
        font-weight: 400;
        color: #FFFF;
        margin-bottom: 0.5rem;
    }
    
    .poster1 .header1 div:nth-child(2){
        font-family: var(--tenor-font);
        font-size: 2.25rem;
        font-weight: 400;
        color: #06005a;
        margin-bottom: 1rem;
        
    }

    .poster1 .header1 div:nth-child(3){
        font-family: var(--plain-text-font);
        font-size: 1rem;
        font-weight: 400;
        color: #FFFF;
        margin-bottom: 1rem;
        
    }
    
    
    
    .poster1 .poster-button {
        margin-top: 1rem;
    }
    
    
    @media only screen and (min-width: 1024px) {
    

    
    .poster1 {
        background-image: url('/covers/cover31.jpg');
    }
    .poster1 .poster-inner {
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
        font-size: 2rem;
    }
    
    .poster1 .header1 div:nth-child(2){
        margin-bottom: 1rem;
        font-size: 3.5rem;
    }

    .poster1 .header1 div:nth-child(3){
        margin: 0;
        font-size: 1.25rem;
    }

    }
    
    </style>
    
    

