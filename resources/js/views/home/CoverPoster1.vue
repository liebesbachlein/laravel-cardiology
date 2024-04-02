<template>
    <div class="poster poster1">
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
    
    .cover-button {
        height: 3.125rem;
        width: 11rem;
        border-radius: 0.25rem;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: var(--plain-text-font);
        font-weight: 500;
        font-size: 1rem;
        color: var(--component-accent-color1);
        background-color: #FFF;
        margin-top: 0.5rem;
    }
    
    .poster1 .cover-button {
        width: 13rem;
    }
    
    .poster {
        width: 100%;
        height: 100%;
        background-size: cover;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: nowrap;
        padding: 0 1rem;
    }
    
    .poster1 {
        background-image: url('/covers/cover19-mobile.jpg');
    }
    
    .poster1 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster1 .header1 {
        text-align: left;
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .poster1 .header2 {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        text-align: left;
        justify-content: center;
        height: 100%;
    }
    
    
    .poster1 .header1 div:nth-child(1) {
        font-family: var(--plain-text-font);
        font-size: 1.125rem;
        font-weight: 400;
        color: #322957d2;
    }
    
    .poster1 .header1 div:nth-child(2) {
        font-family: var(--tenor-font);
        font-size: 3.75rem;
        font-weight: 500;
        color: var(--bright-red);
    }
    
    .poster1 .header1 div:nth-child(3) {
        font-family: var(--tenor-font);
        font-size: 2.5rem;
        font-weight: 400;
        color: #FFF;
    }
    
    .header2 .poster-details-box {
        margin-bottom: 0.5rem;
        display: inline-flex;
        align-items: center;
        border-radius: 0.5rem;
        background-color: #AD78D8bc;
        padding: 0.25rem 0.5rem;
        max-width: auto;
    }
    
    .poster1 .poster-details-box {
        display: none;
    }
    
    .poster-details-name {
        display: inline-block;
        height: 100%;
        text-wrap: wrap;
        font-size: 0.875rem;
        color: #FFF;
    }
    
    .poster-city, .poster-date {
        display: flex;
        flex-wrap: nowrap;
        font-size: 1.125rem;
        font-family: var(--plain-text-font);
        color: #FFF;
        align-items: center;
    }
    
    .poster-city {
        margin: 0.5rem 0;
    }
    
    .poster-date {
        margin-bottom: 1rem;
    }
    
    .poster img {
        display: inline-block;
        width: 2rem;
        height: 2rem;
        margin-right: 0.25rem;
    }
    
    @media only screen and (min-width: 1024px) {
    
    .cover-button:hover {
        color: var(--component-accent-color2)
    }
    
    .poster {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        
    }
    
    .poster1 {
        background-image: url('/covers/cover19.jpg');
    }
    
    .poster1 .box {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster1 .header1 {
        width: 50%;
        padding-left: 5%;
        margin: 0;
    }
    
    .poster1 .header1>div {
        display: block;
    }
    
    .poster1 .header2 {
        width: 50%;
        text-align: left;
        justify-content: center;
        height: 100%;
        margin-top: 0.5rem;
    }
    
    .poster1 .header1 div:nth-child(1) {
        font-weight: 500;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
    }
    
    .poster1 .header1 div:nth-child(2) {
        font-weight: 400;
        font-size: 4rem;
        margin-bottom: 0.5rem;
    }
    
    .poster1 .header1 div:nth-child(3) {
        font-size: 3rem;
        font-weight: 400;
    }
    
    .poster-details-name {
        font-size: 1rem;
    }
    
    .poster-city, .poster-date {
        font-size: 1.25rem;
    }
    .poster-city {
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }
    
    .poster1 .poster-details-box {
        display: block;
    }
    
    }
    
    </style>