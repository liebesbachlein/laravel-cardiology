

<template>
    <div class="partners">
        <HomeHeader title="Наши партнеры"/>
        <div class="partners-icon-grid">
            <div class="grid-row1">
                <div  id="pt1" class="partner-icon">
                    <img src="@/assets/partner_icons/esh_logo.png">
                </div>
                <div id="pt2" class="partner-icon">
                    <img src="@/assets/partner_icons/kzcardio_logo.png">
                </div>
                <div id="pt3" class="partner-icon">
                    <img src="@/assets/partner_icons/rus_logo.png">
                </div>
                <div id="pt4" class="partner-icon">
                    <img src="@/assets/partner_icons/almatymed_logo.png">
                </div>
            </div>

            <div class="grid-row2">
                <div id="pt5" class="partner-icon">
                    <img src="@/assets/partner_icons/gerb_logo.png">
                    <div>Министерство Здравоохранения РК</div>
                </div>
                <div  id="pt6" class="partner-icon">
                    <img src="@/assets/partner_icons/almaty_logo.png">
                    <div>Официальный интернет-ресурс г. Алматы</div>
                </div>
            </div>
            
        </div>

    </div>

</template>

<script>
import HomeHeader from './HomeHeader.vue';

export default {
    components: {HomeHeader}
}

</script>

<style>

@media only screen and (max-width: 768px) {
    

#pt1 {
    width: 100%;
    grid-column: 1;
    grid-row: 1;
}   

#pt1 img {
    max-width: 80%;
}

#pt2 {
    width: 100%;
    grid-column: 2;
    grid-row: 1;
} 

#pt2 img {
    width: 50%;
    grid-column: 2;
}


#pt3 {
    width: 100%;
    grid-column: 2;
    grid-row: 2;
}  

#pt3 img {
    width: 80%;
}


#pt4 {
    width: 100%;
    grid-column: 1;
    grid-row: 2;
}  

#pt4 img {
    width: 60%;
}


#pt5 {
    width: 50%;
}  

#pt5 img {
    width: 40%;
}


#pt6 {
    width: 50%;
}  

#pt6 img {
    width: 40%;
}


.partners {
    width: 100%;
    padding-top: 4rem;
}

.partners-header-cont {
    display: flex;
    justify-content: center;
}

.partners-header {
    display: inline-block;
    text-align: center;
    border-top: 2px solid var(--component-accent-color1);
    padding: 12px;
}

.partners-icon-grid {
    display: grid;
    grid-template-rows: auto auto;
}

.partners-icon-grid .grid-row1 {
    margin-top: 2rem;
    position: relative;
    grid-row: 1;
    display: grid;
    grid-template-columns: 50% 50%;
    grid-template-rows: auto auto;
    align-items: center;
    justify-content: space-evenly;
}

.partners-icon-grid .grid-row1>div {
    text-align: center;
    
}

.partners-icon-grid .grid-row2 {
    padding-top: 2rem;
    grid-row: 2;
    display: flex;
    align-items: flex-start;
}

.partners-icon-grid .grid-row2 h4 {
    width: 90%;
    font-size: 0.875rem;
}

.partner-icon {
    display: inline-block;
    text-align: center;
}

.partner-icon img {
    height: auto;
}

.grid-row2 .partner-icon {
    width: 190px;
    text-align: center;
}

}

@media only screen and (max-width: 1023px) and (min-width: 769px) {
    

    #pt1 {
    width: 100%;
    grid-column: 1;
    grid-row: 1;
}   

#pt1 img {
    max-width: 40%;
}

#pt2 {
    width: 100%;
    grid-column: 2;
    grid-row: 1;
} 

#pt2 img {
    width: 25%;
    grid-column: 2;
}


#pt3 {
    width: 100%;
    grid-column: 2;
    grid-row: 2;
}  

#pt3 img {
    width: 50%;
}


#pt4 {
    width: 100%;
    grid-column: 1;
    grid-row: 2;
}  

#pt4 img {
    width: 30%;
}


#pt5, #pt6 {
    width: 50%;
}  

#pt5 img, #pt6 img {
    width: 20%;
}

#pt5>div, #pt6>div {
    font-size: 0.875;
    padding: 0 20%;
}


.partners {
    width: 100%;
    padding-top: 4rem;
}

.partners-header-cont {
    display: flex;
    justify-content: center;
}

.partners-header {
    display: inline-block;
    text-align: center;
    border-top: 2px solid var(--component-accent-color1);
    padding: 12px;
}

.partners-icon-grid {
    display: grid;
    grid-template-rows: auto auto;
}

.partners-icon-grid .grid-row1 {
    margin-top: 2rem;
    position: relative;
    grid-row: 1;
    display: grid;
    grid-template-columns: 50% 50%;
    grid-template-rows: auto auto;
    align-items: center;
    justify-content: space-evenly;
}

.partners-icon-grid .grid-row1>div {
    text-align: center;
    
}

.partners-icon-grid .grid-row2 {
    padding-top: 2rem;
    grid-row: 2;
    display: flex;
    align-items: flex-start;
}

.partners-icon-grid .grid-row2 h4 {
    width: 90%;
    font-size: 0.875rem;
}

.partner-icon {
    display: inline-block;
    text-align: center;
}

.partner-icon img {
    height: auto;
}

.grid-row2 .partner-icon {
    width: 190px;
    text-align: center;
}

    }

@media only screen and (min-width: 1024px) {

    
#pt1 {
    width: 18%;
}   

#pt1 img {
    max-width: 80%;
}

#pt2 {
    width: 13%;
} 

#pt2 img {
    width: 80%;
}


#pt3 {
    width: 24%;
}  

#pt3 img {
    width: 80%;
}


#pt4 {
    width: 18%;
}  

#pt4 img {
    width: 80%;
}


#pt5 {
    width: 15%;
}  

#pt5 img {
    width: 55%;
}


#pt6 {
    width: 15%;
}  

#pt6 img {
    width: 55%;
}

.partners {
    width: 100%;
    padding-top: 7rem;
}

.partners-icon-grid {
    display: grid;
    padding-top: 3rem;
}

.partners-icon-grid .grid-row1 {
    position: relative;
    bottom: 30px;
    grid-row: 1;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.partners-icon-grid .grid-row2 {
    position: relative;
    bottom: 10px;
    grid-row: 2;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.partner-icon {
    display: inline-block;
    text-align: center;
}

.partner-icon img {
    height: auto;
}

.grid-row2 .partner-icon {
    width: 190px;
    text-align: center;
}



}

</style>