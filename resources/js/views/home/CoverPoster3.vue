<template>

    <div class="poster poster3">
        <div class="poster-inner">
        
        <div class="header1">
            <div>Успешно проведена Конференция в Караганде</div>
        <div>24-25 апреля в гостиничном комплексе «Cosmonaut»  в городе Караганда, состоялась очная региональная школа «Академия кардио-терапевта: Региональный тур»</div>
        <router-link class="poster-button" tag="div" to="/news/academiya-kardio-karaganda-2024-4/">
                Подробнее →</router-link>
        </div>
    
        </div>
    </div>
    
    
    </template>
    
    <script setup>
    
    const emits = defineEmits(['darkMode', 'lightMode'])
    emits('darkMode')
    </script>
    

<style>

    .poster3 {
        background-image: url('/covers/cover18-mobile.jpg');
        padding: 0 1rem;
    }
    
    
    .poster3 .poster-inner {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }
    
    .poster3 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    

    .poster3 .header1 div:nth-child(1){
        font-family: var(--plain-text-font);
        font-size: 2rem;
        font-weight: 400;
        color: #FFF;
        margin-bottom: 1rem;
    }

    .poster3 .header1 div:nth-child(2){
        font-size: 1rem;
        color: #FFF;
        
    }

    
    .poster3 .poster-button {
        margin: 2rem 0 0 0; 
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster3 {
        background-image: url('/covers/cover18.jpg');
    }
    .poster3 .header1 {
        width: 80%;
    }

    .poster3 .header1 div:nth-child(1){
        font-size: 3rem;

    }

    .poster3 .header1 div:nth-child(2){
        font-size: 1.25rem;
    }

    .poster3 .poster-button {
        margin: 2rem 2rem 0 auto; 
    }
}


</style>


<!--<template>
    <div class="poster poster1">
        <div class="poster-inner">
        
        <div class="header1">
            <div class="poster-title">Конференция в Караганде</div>
            <div class="poster-details-box">
                <div class="poster-details-name">
                    Не упустите шанс присоединиться к этому значимому мероприятию, где вы сможете не только обогатить свои знания, но и приобрести практические навыки
                </div>
            </div>
            <div class="poster-city"><img src="@/assets/address.svg">24 — 25 апреля</div>
            <div class="poster-date"><img src="@/assets/time-dark.svg">Гостиничный комплекс "Cosmonaut" по адресу ул. Аманжолова 162а</div>
            <router-link class="poster-button" tag="div" to="/news/konferenziya-v-karagande-2024-4/">
                Читать →</router-link>
        </div>
    
        </div>
    </div>    
</template>
    
<script setup>
    const emits = defineEmits(['darkMode', 'lightMode'])
    emits('lightMode')
    </script>
    
    <style>
        
    
    .poster1 {
        background-image: url('/covers/cover14-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster1 .poster-inner {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster1 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    
    .poster1 .header1 .poster-title {
        font-family: var(--tenor-font);
        font-size: 3rem;
        font-weight: 400;
        color: var(--component-accent-color1);
    
        margin-bottom: 1rem;
        
    }


    .poster1 .poster-details-box {
        margin-bottom: 0.5rem;

        background-color: #559774bc;

    }

    .poster1 .poster-city, .poster1 .poster-date {
        color: #000
    }
    
    @media only screen and (min-width: 1024px) {
    
    
    .poster1 {
        background-image: url('/covers/cover14.jpg');
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
    
    .poster1 .header1  .poster-title{
        font-size: 3rem;
        margin-bottom: 1rem;
        font-weight: 400;
    }

    }
    
    </style>

-->

<!--<template>

    <div class="poster poster1">
        <div class="poster-inner">
        
        <div class="header1">
            <div>Успешно проведена Конференция «Секреты Женского Сердца»</div>
        <div>Уникальность конференции заключалась в ее гибридном формате, который позволил участникам принять участие как лично, так и через онлайн-платформу, обеспечивая максимальную доступность для всех заинтересованных лиц</div>
        <router-link class="poster-button" tag="div" to="/news/proshla-konferentzya-secrety-zheskogo-serdtza-2024/">
                Подробнее →</router-link>
        </div>
    
        </div>
    </div>
    
    
    </template>

    .poster1 {
        background-image: url('/covers/cover24-mobile.jpg');
        padding: 0 1rem;
    }
    
    
    .poster1 .poster-inner {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }
    
    .poster1 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    

    .poster1 .header1 div:nth-child(1){
        font-family: var(--plain-text-font);
        font-size: 2rem;
        font-weight: 400;
        color: #3E3561;
        margin-bottom: 1rem;
    }

    .poster1 .header1 div:nth-child(2){
        font-size: 1rem;
        color: #FFF;
        
    }

    
    .poster1 .poster-button {
        margin: 2rem 0 0 0; 
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster1 {
        background-image: url('/covers/cover24.jpg');
    }
    .poster1 .header1 {
        width: 80%;
    }

    .poster1 .header1 div:nth-child(1){
        font-size: 3rem;

    }

    .poster1 .header1 div:nth-child(2){
        font-size: 1.25rem;
        color: #2D2D2D;
    }

    .poster1 .poster-button {
        margin: 2rem 2rem 0 auto; 
    }
}

-->
