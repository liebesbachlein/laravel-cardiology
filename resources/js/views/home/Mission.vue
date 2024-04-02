<template>
    <div class="mission">
        <div class="site-content-in">
            <HomeHeader title="Наша миссия"/>
            <div class="mission-text">
                    Содействие и усиление профилактической направленности здравоохранения 
                    в области кардиологии с акцентом на артериальную гипертензию, 
                    междисциплинарность исследовательских направлений и задач, 
                    а также сочетание научной и научно-практической деятельности.
            </div>
        </div>
    </div>

</template>

<script>
import HomeHeader from './HomeHeader.vue'

export default {
    components: {HomeHeader}
}

</script>

<style>

    .mission {
    padding: 3rem 0; 
    margin-top: 5rem;
    background-color: var(--component-grey-color);
}

.mission-text {
    padding: 40px;
    font-size: 1.075rem;
}

</style>