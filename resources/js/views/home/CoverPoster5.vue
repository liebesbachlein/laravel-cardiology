<template>

    <div class="poster poster5">
        <div class="box">
        
        <div class="header1">
            <div>Отчет с Конференции «Академия Кардио-Терапевта» в Усть-Каменогорске</div>
            <div>В течение двух дней участники принимали участие в докладах с интерактивными элементами, включая разбор клинических случаев из реальной практики с комментариями экспертов.</div>
            <router-link class="cover-button" tag="div" to="/news/proshla-academia-ust-kamenogorsk-mart-2024/">
                Читать →</router-link>
        </div>
    
        </div>
    </div>
    
    
    </template>
    
    <script>
    
    </script>
    
    <style>
    
    
    .poster5 {
        background-image: url('/covers/cover27-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster5 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster5 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    
    .poster5 .header1 div:nth-child(1){
        font-family: var(--tenor-font);
        font-size: 2rem;
        font-weight: 400;
        color: var(--bright-red);
    
        margin-bottom: 1rem;
        
    }
    
    .poster5 .header1 div:nth-child(2) {
        font-family: var(--plain-text-font);
        font-size: 1rem;
        font-weight: 400;
        color: #FFF;
    }
    
    .poster5 .cover-button {
        margin-top: 2rem;
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster5 {
        background-image: url('/covers/cover27.jpg');
    }
    .poster5 .box {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster5 .header1 {
        width: 50%;
    }
    
    .poster5 .header1 div:nth-child(1){
        font-size: 3rem;
        margin-bottom: 1rem;
        font-weight: 400;
    }
    
    .poster5 .header1 div:nth-child(2){
        font-size: 1.125rem;
        margin: 0;
    }
    
    }
    
    </style>
























<!--<template>

    <div class="poster poster5">
        <div class="box">
        
        <div class="header1">
            <div>Успешно проведена Конференция «Секреты Женского Сердца»</div>
        <div>Уникальность конференции заключалась в ее гибридном формате, который позволил участникам принять участие как лично, так и через онлайн-платформу, обеспечивая максимальную доступность для всех заинтересованных лиц</div>
        <router-link class="cover-button" tag="div" to="/news/proshla-konferentzya-secrety-zheskogo-serdtza-2024/">
                Подробнее →</router-link>
        </div>
    
        </div>
    </div>
    
    
    </template>
    -->

    
/*
    .poster5 {
        background-image: url('/covers/cover24-mobile.jpg');
        padding: 0 1rem;
    }
    
    
    .poster5 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 2rem;
    }
    
    .poster5 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    

    .poster5 .header1 div:nth-child(1){
        font-family: var(--plain-text-font);
        font-size: 2rem;
        font-weight: 400;
        color: #3E3561;
        margin-bottom: 1rem;
    }

    .poster5 .header1 div:nth-child(2){
        font-size: 1rem;
        color: #FFF;
        
    }

    
    .poster5 .cover-button {
        margin: 2rem 0 0 0; 
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster5 {
        background-image: url('/covers/cover24.jpg');
    }
    .poster5 .header1 {
        width: 80%;
    }

    .poster5 .header1 div:nth-child(1){
        font-size: 3rem;

    }

    .poster5 .header1 div:nth-child(2){
        font-size: 1.25rem;
        color: #2D2D2D;
    }

    .poster5 .cover-button {
        margin: 2rem 2rem 0 auto; 
    }
}

*/