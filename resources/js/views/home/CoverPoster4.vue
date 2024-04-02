<template>

    <div class="poster poster4">
        <div class="box">
        
        <div class="header1">
            <div>Рекомендации по физическим нагрузкам для людей с артериальной гипертонией</div>
            <a class="cover-button" tag="div" href="https://www.instagram.com/p/CtqZrrItrZ1/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA==">
                Читать →</a>
        </div>
    
        </div>
    </div>
    
    </template>
    
    <script>
    export default {
        mounted() {
            this.$emit('dark')
        },
    }
    </script>
    
    <style>
    
    
    .poster4 {
        background-image: url('/covers/cover18-mobile.png');
        padding: 0 1rem;
    }
    
    
    .poster4 .box {
        display: flex;
        flex-direction: column;
        width: 100%;
        justify-content: center;
        align-items: center;
    }
    
    .poster4 .header1 {
        width: 90%;
        display: flex;
        text-align: left;
        flex-direction: column;
    }
    

    .poster4 .header1 div:nth-child(1){
        font-family: var(--plain-text-font);
        font-size: 2rem;
        font-weight: 400;
        color: #FFF;
        margin-bottom: 1rem;
    }

    
    .poster4 .cover-button {
        margin-top: 2rem;
    }
    
    @media only screen and (min-width: 1024px) {
    
    .poster4 {
        background-image: url('/covers/cover18.png');
    }
    .poster4 .header1 {
        width: 80%;
    }

    .poster4 .header1 div:nth-child(1){
        font-size: 3rem;

    }
}
    
    </style>