<template>
    <div class="specialists-resources">
        <div class="subpage-title">
            Ресурсы
        </div>

        <div  class="links-menu-box">
            <div class="link-item">
                <a href="#s1"><AddressBox info="Файлы протоколов для скачивания" /></a>
            </div>
            <div class="link-item">
                <a href="#s2"><AddressBox info="Полезные ссылки" /></a>
            </div>
        </div>

        <div class="pt-info-item">
            <div class="pt-info-header" id="s1">
                Файлы протоколов для скачивания
                <img src="@/assets/pin.svg">
            </div>
            <div class="pt-info-text">
                <p>
                    Уважаемые коллеги, рады представить вам новейшие рекомендации по измерению артериального давления у ваших пациентов, разработанные Европейским обществом гипертонии. Здесь вы найдёте файлы для скачивания на русском и казахском языках:
                </p>
                <div  class="file-link-box">
                        <div v-for="file, i in files" :key="'file' + i" class="file-link-item">
                            <img src="@/assets/file.svg"><a :href="'sp_resources/' + file.url" v-text="file.text" @click.prevent="downloadItem(file.url, file.label)"/>
                        </div>
                </div>
            </div>
        </div>


        <div class="pt-info-item">
            <div class="pt-info-header" id="s2">
                Полезные ссылки
                <img src="@/assets/pin.svg">
            </div>
                <div class="file-link-box">
                    <div v-for="link, i in links" :key="'link' + i"  class="file-link-item">
                        <img src="@/assets/link.svg"><a :href="link.url" v-text="link.text"/>
                    </div>
                </div>        
        </div>
    </div>
</template>

<script>

import Axios from 'axios'
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
    setup() {
        const files = [
        {
            "text": "Консенсус: «Рекомендации Европейского общества по гипертонии для офисного и внеофисного измерения артериального давления» (KZ)",
            "label": "consensus_kz.pdf", 
            "url": "/sp_resources/consensus_kz.pdf"
        }, 

        {
            "text": "Консенсус: «Рекомендации Европейского общества по гипертонии для офисного и внеофисного измерения артериального давления» (RU)",
            "label": "consensus_ru.pdf", 
            "url": "/sp_resources/consensus_ru.pdf"
        }, 
        {
            "text": "Методическое пособие: «Офисное измерение артериального давления» (KZ)",
            "label": "office_meas_kz.pdf", 
            "url": "/sp_resources/office_meas_kz.pdf"
        }, 
        {
            "text": "Методическое пособие: «Офисное измерение артериального давления» (RU)",
            "label": "office_meas_ru.pdf", 
            "url": "/sp_resources/office_meas_ru.pdf"
        }, 
        {
            "text": "Протокол лечения по ЛАГ",
            "label": "protocol_lag.pptx", 
            "url": "/sp_resources/protocol_lag.pptx"
        }, 
        {
            "text": "Как развивается ЛАГ",
            "label": "development_ah.pptx", 
            "url": "/sp_resources/development_ah.pptx"
        }, 
        {
            "text": "Как диагностируется ЛАГ",
            "label": "diagnosis_lag.pptx", 
            "url": "/sp_resources/diagnosis_lag.pptx"
        }, 
        {
            "text": "Новые цели ведения пациентов с ЛАГ",
            "label": "new_goals.pptx", 
            "url": "/sp_resources/new_goals.pptx"
        }, 
        {
            "text": "Миф о стабильности пациента с ЛАГ",
            "label": "5_myths.pptx", 
            "url": "/sp_resources/5_myths.pptx"
        }, 
        {
            "text": "План медицинских и образовательных мероприятий",
            "label": "plan_med.pptx", 
            "url": "/sp_resources/plan_med.pptx"
        }, 






    ];

        const links = [
            {
                "url": 'http://scardio.ru/',
                "text": 'Российское кардиологическое общество' 
            },
            {
                "url": 'https://www.ersnet.org/',
                "text": 'European Respiratory Society' 
            },

            {
                "url": 'https://www.whleague.org/',
                "text": 'World Hypertension League (WHL)' 
            },
            {
                "url": 'https://www.radcliffecardiology.com/products-and-services/american-society-hypertension-ash',
                "text": 'American Society of Hypertension (ASH)' 
            },
            {
                "url": 'https://www.eshonline.org/',
                "text": 'European Society of Hypertension' 
            },
            {
                "url": 'https://www.asn-online.org/',
                "text": 'European Association for the Study of Obesity (EASO)' 
            },
            {
                "url": 'https://www.acc.org/#sort=%40fcommonsortdate90022%20descending',
                "text": 'American College of Cardiology (ACC)' 
            },
            {
                "url": 'https://www.asn-online.org/',
                "text": 'American Society of Nephrology (ASN)' 
            },
            {
                "url": 'https://www.nhlbi.nih.gov/',
                "text": 'National Heart, Lung, and Blood Institute' 
            },
            {
                "url": 'https://www.escardio.org/The-ESC/Membership?gclid=CjwKCAjwxOvsBRAjEiwAuY7L8iBY5h7H5frX8uVbphu3Ng8NVDEfAZI4_ygiQg_GL2ii5qf-PM_R8hoCVHoQAvD_BwE',
                "text": 'European Society of Cardiology (ESC)' 
            },
            {
                "url": 'http://ahleague.ru/ru',
                "text": 'Общероссийская ОО «АНТИГИПЕРТЕНЗИВНАЯ ЛИГА»' 
            },

        ]
        
        const downloadItem = (url, label) => {
            Axios.get(url, { responseType: 'blob' })
                .then(response => {
                const blob = new Blob([response.data], { type: 'application/pdf' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = label;
                link.click();
                URL.revokeObjectURL(link.href);
            }).catch(console.error);
        };
        return { files, downloadItem, links };
    }
}

</script>

<style>

.file-link-item a {
    font-size: 1.0625rem;
    font-family: var(--plain-text-font);
    font-weight: 400;
    color: #0098EE;
    text-decoration: underline;
}

.file-link-item {
    display: flex;
    padding: 1.5rem 1.5rem 0 0;
    display: inline-flex;
    align-items: center;
    flex-wrap: nowrap;
}

.file-link-item  img {
    display: inline-block;
    width: 1.5rem;
    height: 1.5rem;
    margin-right: 0.25rem;
}


</style>

