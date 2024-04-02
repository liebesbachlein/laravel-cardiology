<template>
    <div class="monthblock">
        <div class="month" :class="{'month-light': lightUp}">{{ monthName }}</div>

    </div>

</template>

<script>
export default {
    props: ['monthName', 'lightUp']
}
</script>

<style>



    .monthblock {
    z-index: 5;
    margin: 0 1rem 0 auto;
    display: flex;
    justify-content: right;
    position: relative;
}

.month {
    display: inline-flex;
    /*width: 200px;*/
    border-radius: 1.25rem;
    padding: 0.5rem 1rem;
    border: 1px solid var(--component-accent-color2);
    justify-content: center;
    align-items: center;
    color: var(--component-accent-color2);
    font-family: var(--plain-text-font);
    font-weight: 400;
    font-size: 0.875rem;
    background-color: var(--component-grey-color);
}

.month-light {
    background-color: #FFF;
    color: #828698;
    border: 1px solid transparent;
    box-shadow: -1px 1px 2px 0px rgba(171, 183, 208, 0.3);

}


@media only screen and (min-width: 1024px) {
.monthblock {
    z-index: 5;
    margin: 0 0 0 auto;
    width: 12rem;
    display: flex;
    justify-content: center;
    position: relative;
}

.month {
    display: inline-flex;
    /*width: 200px;*/
    border-radius: 1.25rem;
    padding: 0.5rem 1rem;
    border: 1px solid var(--component-accent-color2);
    justify-content: center;
    align-items: center;
    color: var(--component-accent-color2);
    font-family: var(--news-title-font);
    font-weight: 500;
    font-size: 1rem;
    background-color: var(--component-grey-color);
}

.month-light {
    background-color: #FFF;
    color: #454545;
    border: 1px solid transparent;
    box-shadow: -1px 1px 5px 0px rgba(171, 183, 208, 0.6);

}

}


</style>