<template>
<div class="home-header-box-sinus">
    <div class="home-header">{{ title }}</div>
    <div class="rhythm-img-sinus">
        <img src="@/assets/sinus_rhythm.svg">
    </div>
</div>

</template>


<script>

export default {
    props: ['title']
}

</script>

<style>

.rhythm-img-sinus {
    grid-column: 2;
    display: flex;
    justify-content: flex-end;
    position: relative;
    bottom: 68px;
    left: 0px;
}

.home-header-box-sinus {
    display: grid;
    grid-template-columns: auto auto;
    justify-content: flex-start;
}

.home-header-box-sinus .home-header {
    grid-column: 1;
    border-top: 2px solid var(--component-accent-color1);
}

</style>