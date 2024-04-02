<template>
    <div class="pt-info">
        <div class="subpage-title">
            Полезная информация
        </div>
        
        <div  class="links-menu-box">
            <div v-for="pt, i in ptInfo" class="link-item">
                <a :href="'#ptlink' + i">
                    <AddressBox :info="pt.title" />
                </a>
            </div>
            
        </div>
        
        <div class="pt-info-content">
            <div v-for="pt, i in ptInfo" :key="'ptlink' + i" class="pt-info-item">
                <div class="pt-info-header" :id="'ptlink' + i">
                    {{ pt.title }}
                    <img src="@/assets/pin.svg">
                </div>
                <div class="pt-info-text">
                    {{ pt.text }}
                </div>
                <div v-if="pt.iframe.length" class="pt-info-video">
                    <iframe width="getWidth" height="getHeight" :src="pt.iframe"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>



    </div>
</template>

<script>

import AddressBox from '../home/AddressBox.vue';


export default {
    components: {AddressBox},
    mounted() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => { 
            anchor.addEventListener('click', function (e) { 
                e.preventDefault(); 
                const targetElement =  
                      document.querySelector(this.getAttribute('href')); 
                window.scrollTo({ 
                    top: targetElement.offsetTop, 
                    behavior: 'smooth' 
                }); 
            }); 
        }); 
    },
    methods: {
        getHeight() {
            return window.innerWidth * 315 / 560
        }, 
        getWidth() {
            return window.innerWidth
        }, 
    },
    data: () => {
        return {
            ptInfo: [
                {
                    title: "Как проявляется стенокардия?",
                    iframe: "",
                    text: "Стенокардия – это своеобразный сигнал сердца о недостаточном кровоснабжении сердечной мышцы. Не всегда боль в сердце может проявляться за грудиной, симптомы стенокардии могут быть разными. Не игнорируйте свои ощущения и дискомфорт. Проконсультируйтесь с врачом, если заметили что-то подобное у себя: тяжесть в груди, усталость, затруднение дыхания, боль в руке, дискомфорт в области желудка, боль в шее. Стенокардию лучше держать под контролем, чем лечить ее осложнения, такие как инфаркт миокарда, сердечная недостаточность и так далее."

                },
                {
                    title: "Ошибки измерения артериального давления измерения артериального давления измерения артериального давления",
                    iframe: "https://www.youtube.com/embed/nkY9txjiNQg?si=Kk89rySJ584Ld69W",
                    text: "Многие пациенты допускают ошибки при измерении артериального давления. Что влияет на точность результатов измерений? Ознакомьтесь, чтобы не допустить искажения Ваших результатов."

                },

                {
                    title: "Правила измерения пульса",
                    iframe: "https://www.youtube.com/embed/6RpS8ZgSuVU?si=q5UvHnfxn-M8gh_w",
                    text: "По изменению пульса можно предположить о состоянии сердца и организма в целом. Просмотрев видео, Вы узнаете, как правильно измерить пульс самостоятельно и с помощью пульсометра."

                },

                {
                    title: "Техника измерения артериального давления",
                    iframe: "https://www.youtube.com/embed/esOQRX4BeB4?si=SoRkVeNf0uUS9x6B",
                    text: "Важно знать и уметь правильно измерять артериальное давление! В ролике представлен материал о подготовке к измерению артериального давления и изложены основные правила его измерения."

                },

                {
                    title: "Виды тонометров",
                    iframe: "https://www.youtube.com/embed/Xkoxq3vhd20?si=1vswe4fj6zb-RKi2",
                    text: "Какие на сегодняшний день существует тонометры? Какой тонометр лучше всего подобрать в той или иной ситуации? Ответы на эти вопросы Вы получите, просмотрев данный видеоролик."

                },

            ]
        }
    },
}


</script>

<style>


.pt-info {
    width: 100%;
    display: flex;
    flex-direction: column;
}

.pt-info-item {
    display: flex;
    flex-direction: column;
    margin-bottom: 3rem;
}

.pt-info-header {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    display: inline-flex;
    height: fit-content;
    flex-wrap: nowrap;
    align-items: baseline;
    width: 100%;
}

.pt-info-header img {
    display: inline-block;
    width: 1.5rem;
    height: 1.5rem;
    margin-left: 1rem;
    position: relative;
    top: 2px;
}

.pt-info-text {
    font-size: 1rem;
    width: 100%;
}

.pt-info-video {
    text-align: center;
    margin-top: 1rem;
    max-width: 100%;
}

.links-menu-box {
    margin-bottom: 2rem;

}

.links-menu-box .address-box {
    margin: 0.5rem 0;
    max-width: fit-content;
}

.links-menu-box .address-box:hover {
    background-color: #f16676;
}

.links-menu-box .address-box:hover .address-name {
    color: #FFF
}

</style>