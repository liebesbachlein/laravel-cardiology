<template>
    <div class="newstimeline">
        <div class="site-content-in">
            <HomeHeader title="Прошедшие мероприятия" style="margin-bottom: 1.5rem;"/>

            <div class="sticky-box" id="circle">
                <div class="linecircle_fixed">
                    <div class="linecircle_circle_fixed" :style="{borderColor: hideCircle ? 'transparent' : 'var(--component-accent-color2)'}" />
                </div> 
            </div>


            <div v-for="eventsByMonth, i in events" :key="i">
                <MonthBlock :id="`monthBlock${i}`" 
                :month="months[eventsByMonth[0].month - 1] + ' ' + eventsByMonth[0].year" 
                :lightUp="monthLightUp[i]" style="position: relative"/>
                <div v-for="event, i in eventsByMonth" class="month-news" :key="i">
                    <NewsMiniRight :event="event"/>
                </div>                          
                <MonthBlock v-if="i == events.length - 1" :id="'monthBlock' + events.length" 
                :month="months[events[events.length - 1][0].month] + ' ' + events[events.length - 1][0].year" 
                :lightUp="monthLightUp[events.length]" style="position: relative; "/>
            </div>

        </div>
    </div>

</template>

<script setup>
import MonthBlock from './MonthBlock.vue';
import NewsMiniRight from './NewsMiniRight.vue';
import HomeHeader from './HomeHeader.vue'
import { onMounted, computed, ref, watch } from 'vue';

const months = [
    ['Январь'],
    ['Февраль'],
    ['Март'],
    ['Апрель'],
    ['Май'],
    ['Июнь'],
    ['Июль'],
    ['Август'],
    ['Сентябрь'],
    ['Октябрь'],
    ['Ноябрь'],
    ['Декабрь']
]

const data = [
    {
        date_start: 24,
        date_end: 25,
        month: 4,
        year: 2024,
        title: 'Региональный тур «Академия Kардио-терапевта»', 
        address: 'Гостиничный комплекс "Cosmonaut", ул. Аманжолова 162а, Караганда', 
        details: 'Не упустите шанс присоединиться к этому значимому мероприятию, где вы сможете не только обогатить свои знания, но и приобрести практические навыки, необходимые для успешной работы в области сердечно-сосудистой медицины. ',
        url: "/news/academiya-kardio-karaganda-2024-4/"
    },

    {
        date_start: 29,
        date_end: 30,
        month: 4,
        year: 2024,
        title: 'Региональный тур «Академия Kардио-терапевта»', 
        address: 'Конференц-зал отеля «Dastan Hotel Aktobe», ул. Бокенбай батыра, 2, Актобе',  
        details: 'В рамках этого события будет представлен широкий спектр актуальных тем, связанных с кардиологией и терапией. Ожидается представление лекционного материала, проведение workshop\'ов и мастер-классы по оценке кардиоваскулярного риска с примерами клинических случаев.',
        url: "/news/academiya-kardio-aktobe-2024-4/"
    },
    {
        date_start: 17,
        date_end: null,
        month: 5,
        year: 2024,
        title: 'Научно-практическая конференция «Многогранная гипертония»', 
        address: 'Отель "Kazzhol Park Almaty", ул. Наурызбай батыра, 108, Алматы', 
        details: 'Научно-практической конференция «Многогранная гипертония» организовано при поддержке Европейского Общества Гипертонии (ESH) и Всемирной Федерации Сердца (WHF) и посвященно Всемирному дню борьбы с артериальной гипертонией',
        url: "/news/proshla-konf-mnogogran-2024-5/"
    }
]

const events = [[data[0]]]

for (let i = 1; i < data.length; i++) {
    if (data[i].month != data[i - 1].month) {
        events.push([data[i]])
    } else {
        events[events.length - 1].push(data[i])
    }
}

const monthBlockOffsets = []
const monthLightUp = ref([])

for (let i = 0; i < events.length + 1; i++) {
    monthBlockOffsets.push([0, 0])
    monthLightUp.value.push(false)
}

const circleOffset = ref(0)
const hideCircle = ref(true)


onMounted(() => {
    window.addEventListener('scroll', () => {

        for (let i = 0; i < monthBlockOffsets.length; i++) {
            monthBlockOffsets[i] = [
            document.getElementById('monthBlock' + i).getBoundingClientRect().top, 
            document.getElementById('monthBlock' + i).getBoundingClientRect().bottom
        ]
        }
        circleOffset.value = document.getElementById('circle').getBoundingClientRect().top

        for(let i = 0; i < monthBlockOffsets.length; i++) {
            if (i != monthBlockOffsets.length - 1) {
                if (Math.abs(monthBlockOffsets[i][0] - circleOffset.value) < 50 || 
                Math.abs(monthBlockOffsets[i][1] - circleOffset.value) <= 
                Math.abs(monthBlockOffsets[i][0] - monthBlockOffsets[i + 1][0]) / 2) {
                    for(let j = 0; j < monthLightUp.value.length; j++) {
                        
                        monthLightUp.value[j] = false
                    }
                    monthLightUp.value[i] = true
                    if(Math.abs(monthBlockOffsets[0][0] - circleOffset.value) <= 10
                && monthBlockOffsets[0][0] - circleOffset.value > 0) {
                        hideCircle.value = true
                    } else {
                        hideCircle.value = false
                    }
                }
            } else {
                if (Math.abs(monthBlockOffsets[i][0] - circleOffset.value) < 50 || 
                Math.abs(monthBlockOffsets[i][1] - circleOffset.value) <= 
                Math.abs(monthBlockOffsets[i][0] - monthBlockOffsets[i - 1][0]) / 2) {
                    for(let j = 0; j < monthLightUp.value.length; j++) {
                        monthLightUp.value[j] = false
                    }
                    monthLightUp.value[i] = true
                    hideCircle.value = false
                }
            }
        }

        
    }) 
})






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
