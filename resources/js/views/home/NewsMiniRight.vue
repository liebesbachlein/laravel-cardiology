<template>
    
    <div class="newsmini-right">
        <div class="news-box-padding">
            <div class="news-box">
                <div v-if="!mobile" class="newsmini-upper">
                    <DateBox :date_start="event.date_start" :date_end="event.date_end"  :month="months[event.month - 1]"/>
                    <AddressBox :address="event.address"/>
                </div>  

                <DateBox v-if="mobile"  id="mobile1" :date_start="event.date_start" :date_end="event.date_end"  :month="months[event.month - 1]"/>
                <AddressBox v-if="mobile" id="mobile2" :address="event.address"/>
        
                <div class="news-title">
                    <router-link :to="event.url">
                        {{ event.title }}
                    </router-link>
                </div>
                <div class="news-detail">{{ event.details }}</div>  
            </div>
        <LineCircle class="newsmini-line"/>
        </div>
    </div>
    
    </template>
    
    <script>
    import LineCircle from './LineCircle.vue';
    import ChevronRight from '@/components/ChevronRight.vue';
    import DateBox from './DateBox.vue';
    import AddressBox from './AddressBox.vue';
    
    export default {
        props: ['event'],
        components: {LineCircle, ChevronRight, DateBox, AddressBox},
        data: function() {
            return {
                mobile: null,
                months: [
    'Января',
    'Февраля',
    'Марта',
    'Апреля',
    'Мая',
    'Июня',
    'Июля',
    'Августа',
    'Сентября',
    'Октября',
    'Ноября',
    'Декабря'
]
            }
        },
        mounted() {
            
            this.mobile = window.matchMedia("(max-width: 1023px)").matches

            addEventListener("resize", (event) => {
                this.mobile = window.matchMedia("(max-width: 1023px)").matches
            });
        },
    }
    
    </script>
    
    <style>

.newsmini-upper {
        display: none;
    }

    #mobile1 {
        grid-column: 1;
        grid-row: 1;
        margin-bottom: 1rem;

    }
    #mobile2 {
        grid-column: 1;
        grid-row: 4;
        margin-top: 1rem;
    }

    
    .newsmini-right {
        width: 100%;
    }

    .news-box-padding {
        padding: 1rem
    }

    
    .news-box {
        display: grid;
        background-color: #FFF;
        box-shadow: -1px 1px 4px 0px rgba(212, 211, 211, 0.5);
        border-radius: 0.25rem;
        width: 100%;
        padding: 1rem;
    }
    
    
    .newsmini-right .news-detail {
        display: inline;
        font-size: 1rem;
        font-weight: 400;
    }
    
    .news-title {
        margin-bottom: 0.5rem;
    }
    
    .news-title a {
        color: var(--component-accent-color2);
        font-size: 1.125rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
        transition: all 0.1s ease;
    }

@media only screen and (max-width: 1023px) {

    
    .newsmini-right .news-detail {
        grid-column: 1;
        grid-row: 3;
    }
    
    .news-title {
        grid-column: 1;
        grid-row: 2;
    }

    .newsmini-right .newsmini-line {
        width: 0;
        display: none;
    }

}

    
 @media only screen and (min-width: 1024px) {
    
        #mobile1 {
            display: none;
        }

        #mobile2 {
            display: none;
        }

    .newsmini-upper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .newsmini-right {
        display: flex;
        width: 100%;
    }

    .news-box-padding {
        padding: 0;
        display: flex;
        width: 100%;
        justify-content: space-between;
    }
    
    .newsmini-right .newsmini-line {
        width: 12rem;
    }

    .news-box {
        display: flex;
        flex-direction: column;
        box-shadow: -2px 2px 10px 0px rgba(212, 211, 211, 0.5);
        border-radius: 1rem;
        width: 75%;
        padding: 1rem;
        flex-wrap: nowrap;
        margin: 1rem 0 1rem 2rem;
    }

    .news-box:hover {
        box-shadow: -2px 2px 10px 0px rgba(171, 183, 208, 0.6);
    }
    

    .news-title a:hover {
        color: var(--component-accent-color1);
    }


    
    }
    </style>