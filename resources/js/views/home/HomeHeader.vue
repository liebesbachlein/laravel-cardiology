<template>
<div class="home-header-box">
    <div class="home-header">{{ title }}</div>
</div>

</template>


<script>

export default {
    props: ['title']
}

</script>

<style>


.home-header {
    font-size: 1.75rem;
    margin-left: 1.5rem;
    font-weight: 600;
    display: inline-block;
    font-family: var(--messiri-font);
    color: #2D2D2D;
    font-style: normal;
}




.home-header-box {
    display: flex;
    justify-content: flex-start;
}

@media only screen and (min-width: 1024px) {
.home-header {
    font-size: 2.5rem;
    font-weight: 500;
    margin: 0;
}

}



</style>