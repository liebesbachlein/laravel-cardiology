<template>
    <div class="newstimeline">
        <div class="site-content-in" id="newsTimeline">
            <HomeHeader title="Мероприятия" id="header"/>
    

        <div class="sticky-box" id="circle">
            <div class="linecircle_fixed">
                <div class="linecircle_circle_fixed" :style="{borderColor: hideCircle ? 'transparent' : 'var(--component-accent-color2)'}" />
            </div> 
        </div>

        <MonthBlock id="m1" monthName="Апрель 2024" :lightUp="ms[0]" style="position: relative"/>
        <div class="month-news">
            <NewsMiniRight :news="news[0]"/>
        </div>
        <div class="month-news">
            <NewsMiniRight :news="news[1]"/>
        </div>

        <MonthBlock id="m2" monthName="Май 2024" :lightUp="ms[1]" style="position: relative; "/>
        <div class="month-news">
            <NewsMiniRight :news="news[2]"/>
        </div>
        <MonthBlock id="m3" monthName="Июнь 2024" :lightUp="ms[2]" style="position: relative; "/>
        <!--<div class="month-news">
            <NewsMiniRight :news="news[1]"/>
            <NewsMiniRight :news="news[2]"/>
        </div>

        <MonthBlock id="m3" monthName="Апрель 2024" :lightUp="ms[2]" style="position: relative"/>
        <div class="month-news">
            <NewsMiniRight :news="news[3]"/>
        </div>
-->
    </div>
    </div>

</template>

<script>
import MonthBlock from './MonthBlock.vue';
import NewsMiniRight from './NewsMiniRight.vue';
import HomeHeader from './HomeHeader.vue'

export default {
    components: {MonthBlock, NewsMiniRight, HomeHeader},
    mounted() {

        window.addEventListener('scroll', () => {
            if (document.getElementById('m1')) {
                this.offsets1 = [document.getElementById('m1').getBoundingClientRect().top, document.getElementById('m1').getBoundingClientRect().bottom]
                this.offsets2 = [document.getElementById('m2').getBoundingClientRect().top, document.getElementById('m2').getBoundingClientRect().bottom]
                this.offsets3 = [document.getElementById('m3').getBoundingClientRect().top, document.getElementById('m3').getBoundingClientRect().bottom]
                this.circleOffset = document.getElementById('circle').getBoundingClientRect().top
            }
        }) 

        


    },
    computed: {
        ms() {
            let ms = [false, false, false]
            const dis12 = Math.abs(this.offsets1[0] - this.offsets2[0])
            const dis23 = Math.abs(this.offsets2[0] - this.offsets3[0])

            if (Math.abs(this.offsets1[0] - this.circleOffset) < 50 || Math.abs(this.offsets1[1] - this.circleOffset) <= dis12 / 2) {
                ms[0] = true
                ms[1] = false
                ms[2] = false
                if(Math.abs(this.offsets1[0] - this.circleOffset) <= 10 || Math.abs(this.offsets1[2] - this.circleOffset) <= 10) {
                    this.hideCircle = true
                } else {
                    this.hideCircle = false
                }
            } else if (Math.abs(this.offsets2[0] - this.circleOffset) < dis12 / 2 || Math.abs(this.offsets2[1] - this.circleOffset) <= dis23 / 2) {
                ms[0] = false
                ms[1] = true
                ms[2] = false
                this.hideCircle = false
            } else if (Math.abs(this.offsets3[0] - this.circleOffset) < dis23 / 2 || Math.abs(this.offsets3[1] - this.circleOffset) < 50) {
                ms[0] = false
                ms[1] = false
                ms[2] = true
                this.hideCircle = false
            } 

            return ms
        }
    },
    data: function() {
        return {
            offsets1: [0, 0],
            offsets2: [0, 0],
            offsets3:  [0, 0],
            circleOffset: 0,
            hideCircle: true,
        news: [
        {date1: '24', 
            date2: '25',
            month: 'апреля',
            title: 'Региональный тур «Академия Kардио-терапевта»', 
            address: 'Гостиничный комплекс "Cosmonaut", ул. Аманжолова 162а, Караганда', 
            details: 'Не упустите шанс присоединиться к этому значимому мероприятию, где вы сможете не только обогатить свои знания, но и приобрести практические навыки, необходимые для успешной работы в области сердечно-сосудистой медицины. ',
            url: "/news/konferenziya-v-karagange/"},
            {date1: '29', 
            date2: '30',
            month: 'апреля',
            title: 'Региональный тур «Академия Kардио-терапевта»', 
            address: 'Конференц-зал отеля «Dastan Hotel Aktobe», ул. Бокенбай батыра, 2, Актобе. ', 
            details: 'В рамках этого события будет представлен широкий спектр актуальных тем, связанных с кардиологией и терапией. Ожидается представление лекционного материала, проведение workshop\'ов и мастер-классы по оценке кардиоваскулярного риска с примерами клинических случаев.',
            url: "/news/acamedia-aktobe-2024/"},
            {date1: '16', 
            date2: '17',
            month: 'мая',
            title: 'Научно-практическая конференция «Многогранная гипертония»', 
            address: 'Отель "Kazzhol Park Almaty", ул. Наурызбай батыра, 108, Алматы', 
            details: 'Научно-практической конференция «Многогранная гипертония» организовано при поддержке Европейского Общества Гипертонии (ESH) и Всемирной Федерации Сердца (WHF) и посвященно Всемирному дню борьбы с артериальной гипертонией',
            url: "/news/mnogogrannaya-hypertoniya-may-2024/"}
    ]
    }
}
}

</script>

<style>

@media only screen and (max-width: 768px) {
    .sticky-box {
    width: 100%;
    z-index: 4;
    position: sticky;
    transition: none;
    display: flex;
    justify-content: flex-end;
    top: calc(50vh);
    transition: none;
    visibility: hidden;
}

.linecircle_fixed {
    display: flex;
    width: 4rem;
    align-items: center;
    justify-content: center;
    transition: none;
    visibility: hidden;
}

.linecircle_circle_fixed {
    height: 10px;
    width: 11px;
    border-radius: 15px;
    background-color: var(--component-grey-color);
    border: 1px solid var(--component-accent-color2);
    transition: none;
    visibility: hidden;
}

.newstimeline {
    display: block;
    width: 100%;
    padding: 3rem 0;
    background-color: var(--component-grey-color);

}

.month-news {
    margin: 0;
}


}

@media only screen and (max-width: 1023px) and (min-width: 769px) {
    .sticky-box {
    width: 100%;
    z-index: 4;
    position: sticky;
    transition: none;
    display: flex;
    justify-content: flex-end;
    top: calc(50vh);
    transition: none;
    visibility: hidden;
}

.linecircle_fixed {
    display: flex;
    width: 4rem;
    align-items: center;
    justify-content: center;
    transition: none;
    visibility: hidden;
}

.linecircle_circle_fixed {
    height: 10px;
    width: 11px;
    border-radius: 15px;
    background-color: var(--component-grey-color);
    border: 1px solid var(--component-accent-color2);
    transition: none;
    visibility: hidden;
}

.newstimeline {
    display: block;
    width: 100%;
    padding: 3rem 0;
    background-color: var(--component-grey-color);

}

.month-news {
    margin: 0;
}


}

@media only screen and (min-width: 1024px) {

.sticky-box {
    width: 100%;
    z-index: 4;
    position: sticky;
    transition: none;
    display: flex;
    justify-content: flex-end;
    top: calc(50vh);
    transition: none;
}

.linecircle_fixed {
    display: flex;
    width: 12rem;
    align-items: center;
    justify-content: center;
    transition: none;
}

.linecircle_circle_fixed {
    height: 10px;
    width: 11px;
    border-radius: 15px;
    background-color: var(--component-grey-color);
    border: 1px solid var(--component-accent-color2);
    transition: none;
}

.newstimeline {
    display: block;
    width: 100%;
    background-color: var(--component-grey-color);
    padding: 2rem 0;
}
}
</style>