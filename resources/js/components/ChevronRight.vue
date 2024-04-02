<template>
    <div class="chevron-right-col1" :class="[color === 'red' ? 'chevron-right-col1' : color === 'grey' ? 'chevron-right-col3' :'chevron-right-col2']"></div>
</template>

<script>

export default {
    props: ['color']
}

</script>

<style>

.chevron-right-col1 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-right-col1::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid var(--component-accent-color1);
    border-right: 2px solid var(--component-accent-color1);
    transform: rotate(-45deg);
    right: 3px;
    top: 0px
}

.chevron-right-col2 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-right-col2::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid var(--component-accent-color2);
    border-right: 2px solid var(--component-accent-color2);
    transform: rotate(-45deg);
    right: 3px;
    top: 0px
}

.chevron-right-col3 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-right-col3::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid #98abcf;
    border-right: 2px solid #98abcf;
    transform: rotate(-45deg);
    right: 3px;
    top: 0px
}

</style>