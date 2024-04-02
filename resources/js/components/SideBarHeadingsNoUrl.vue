<template>

    <div class="sidebarheading-no-url">
        <div class="chevron-right-col2" :class="{'chevron-right-col2-active': isActive}"></div>
        <div class="side-word" :class="{'side-word-active': isActive, 'side-word-check': check}" >
            {{ heading }}
        </div>
    </div>

</template>

<script>
import ChevronRight from '@/components/ChevronRight.vue';
import ChevronLeft from '@/components/ChevronLeft.vue';

export default {
    components: { ChevronRight, ChevronLeft },
    props: ['heading', 'isActive', 'check']
}

</script>

<style>

.sidebarheading-no-url {
    display: flex;
    margin: 1.5rem 0;
    align-items: center;
    cursor: pointer;
}

.sidebarheading-no-url .side-word {
    display: inline-block;
    margin-left: 1rem;
    font-weight: 400;
}

.side-word-check:hover {
    color: var(--bright-red);
}

.sidebarheading-no-url .side-word-active {
    color: var(--component-accent-color2);
    font-weight: 500;
}

.chevron-right-col2-active {
    transform: rotate(180deg);
}

</style>