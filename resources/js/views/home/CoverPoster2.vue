
<template>
    <div class="poster poster2">
            <div class="box">
               
                <div class="header1">
                    <div>Региональный тур</div>
                    <div>Академия</div>
                    <div>Kардио-терапевта</div>
                </div> 
                <div class="header2">
                    <div class="poster-details-box"><div class="poster-details-name">Широкий спектр актуальных тем</div></div>
                    <div class="poster-details-box"><div class="poster-details-name">Проведение workshop'ов</div></div>
                    <div class="poster-details-box"><div class="poster-details-name">Практические мастер-классы</div></div>
                    <div class="poster-city"><img src="@/assets/address-white.svg">              
                        Конференц-зал отеля «Dastan Hotel Aktobe», ул. Бокенбай батыра, 2, Актобе. </div>
                    <div class="poster-date"><img src="@/assets/time.svg">29 — 30 апреля</div>
                    
                    <a class="cover-button" tag="div" href="/news/acamedia-aktobe-2024/">
                        Подробнее →</a>
                    
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
    

    
    .poster2 .cover-button {
        width: 13rem;
    }
    

    
    .poster2 {
        background-image: url('/covers/cover19-mobile.jpg');
    }
    
    .poster2 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster2 .header1 {
        text-align: left;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .poster2 .header2 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        text-align: left;
        justify-content: center;
        height: 100%;
    }
    
    
    .poster2 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.125rem;
        font-weight: 400;
        color: #322957d2;
    }
    
    .poster2 .header1 div:nth-child(2) {
        font-family: var(--tenor-font);
        font-size: 3.75rem;
        font-weight: 500;
        color: var(--bright-red);
    }
    
    .poster2 .header1 div:nth-child(3) {
        font-family: var(--tenor-font);
        font-size: 2.5rem;
        font-weight: 400;
        color: #FFF;
    }
    

    
    .poster2 .poster-details-box {
        display: none;
    }
    
    @media only screen and (min-width: 1024px) {
    

    .poster2 {
        background-image: url('/covers/cover19.jpg');
    }
    
    .poster2 .box {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster2 .header1 {
        width: 50%;
        padding-left: 5%;
        margin: 0;
    }
    
    .poster2 .header1>div {
        display: block;
    }
    
    .poster2 .header2 {
        width: 50%;
        text-align: left;
        justify-content: center;
        height: 100%;
        margin-top: 0.5rem;
    }
    
    .poster2 .header1 div:nth-child(1) {
        font-weight: 500;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }
    
    .poster2 .header1 div:nth-child(2) {
        font-weight: 400;
        font-size: 4rem;
        margin-bottom: 0.5rem;
    }
    
    .poster2 .header1 div:nth-child(3) {
        font-size: 3rem;
        font-weight: 400;
    }
    
    
    .poster2 .poster-details-box {
        display: block;
    }
    
    }
    
    </style>