<template>
    <div class="chevron-header-box">
        
        <div class="head-name">
            {{ text }}
        </div>
    </div>

</template>

<script>

import ChevronLeft from './ChevronLeft.vue';

export default {
    props: ['text'],
    components: {ChevronLeft}
}

</script>

<style>
.chevron-header-box {
    width: 100%;
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    margin: 2rem 0 1rem 0;
}

.chevron-header-box .head-name {
    display: inline-block;
    color: var(--component-accent-color2);
    font-weight: 500;
}


</style>