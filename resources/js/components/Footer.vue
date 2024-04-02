<template>

    <div class="footer">
        <div class="site-content-in">
            <div class="footer-upper">
                <div class="footer-contacts">
                    <div class="footer-number">8 (701) 492-48-11</div>
                    <div class="footer-text">Подписывайтесь на нас в социальных сетях</div>
                    <div class="footer-links">
                        
                        <a href="https://www.instagram.com/cardio_experts.kz/">
                            <img tag="img" src="@/assets/social_media_icons/inst.png" href="https://www.instagram.com/cardio_experts.kz?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">
                        </a>
                            <img src="@/assets/social_media_icons/fb.png" style="visibility: hidden;">
                        
                        
                            <img src="@/assets/social_media_icons/tw.png" style="visibility: hidden;">
                       
                    </div>
                </div>
                <div class="footer-lang-box">
                    <div class="footer-lang-item-active" >
                        Русский
                    </div>
                    <div class="footer-lang-item" style="visibility: hidden;">
                        Қазақ
                    </div>
                </div>
        </div>

        <div class="footer-lower">
                © ОО "Общество специалистов по артериальной гипертонии и кардиоваскулярной 
                профилактике", 2019-2024. Адрес: Республика Казахстан, город Алматы, ул. Жибек Жолы 8, 
                офис 31
        </div>
    </div>
    </div>

</template>

<style>


.footer * {
        color: #FFF;
    }

    .footer {
    width: 100%;
    background-color: #6495ED;;
    padding: 3rem 1rem 1rem 1rem;

}

.footer-upper {
    display: flex;
    flex-direction: column;
    margin: 1rem 0;
}

.footer-contacts {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.footer-number {
    font-size: 2rem;
    letter-spacing: 4px;
    font-weight: 500;
    font-family: var(--news-title-font);
    margin-bottom: 1rem;
}

.footer-text {
    font-size: 1.075rem;
}

.footer-links {
    display: flex;
    justify-content: space-between;
    width: 60%;
    margin: 2rem 0;
}

.footer-links img {
    width: 1.5rem;
    height: 1.5rem;
}

.footer-lang-item, .footer-lang-item-active {
    font-size: 1.075rem;
    margin: 0.5rem 0;
    cursor: pointer;
}

.footer-lang-item-active {
    font-weight: 600;
}

.footer-lower {
    font-size: 0.875rem;
}


@media only screen and (min-width: 1024px) {

.footer {
    padding: 3rem 0 1rem 0;
}

.footer-upper {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
}

.footer-links {
    width: 100%;
}
}

</style>