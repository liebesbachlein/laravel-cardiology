<template>
    <div class="poster poster2">
        <div class="poster-inner">    
            <div class="header1">
                <div>Отчет с Конференции «Академия Кардио-Терапевта» в Актобе</div>
                <div>В течение двух дней участники принимали участие в докладах с интерактивными элементами и разборами клинических случаев из реальной практики с комментариями экспертов.</div>
                <router-link class="poster-button" tag="div" to="news/academiya-kardio-aktobe-2024-4/">
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
    
    
    .poster2 {
        background-image: url('/covers/cover42-mobile.jpg');
        padding: 0 1rem;
    }
    
    .poster2 .poster-inner {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster2 .header1 {
        width: 95%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    
    .poster2 .header1 div:nth-child(1){
        font-family: var(--tenor-font);
        font-size: 1.75rem;
        font-weight: 400;
        color: var(--bright-red);
    
        margin-bottom: 1rem;
        
    }
    
    .poster2 .header1 div:nth-child(2) {
        font-family: var(--plain-text-font);
        font-size: 1rem;
        font-weight: 400;
        color: #000000bc;
    }
    
    .poster2 .poster-button {
        margin-top: 2rem;
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster2 {
        background-image: url('/covers/cover42.jpg');
    }
    .poster2 .poster-inner {
        display: inline-flex;
        justify-content: center;
        align-items: flex-start;
        flex-direction: row;
    }
    
    .poster2 .header1 {
        width: 50%;
    }
    
    .poster2 .header1 div:nth-child(1){
        font-size: 3rem;
        margin-bottom: 1rem;
        font-weight: 400;
    }
    
    .poster2 .header1 div:nth-child(2){
        font-size: 1.25rem;
        margin: 0;
    }
    
    }
    
    </style>
























