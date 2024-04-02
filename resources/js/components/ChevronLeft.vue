<template>
    <div class="chevron-left-col1" :class="[color === 'red' ? 'chevron-left-col1' : color === 'grey' ? 'chevron-left-col3' : 'chevron-left-col2']"></div>
</template>

<script>

export default {
    props: ['color']
}

</script>

<style>

.chevron-left-col1 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-left-col1::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid var(--component-accent-color1);
    border-right: 2px solid var(--component-accent-color1);
    transform: rotate(135deg);
    right: 3px;
    top: 0px;
    left: 5px;
}

.chevron-left-col2 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-left-col2::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid var(--component-accent-color2);
    border-right: 2px solid var(--component-accent-color2);
    transform: rotate(135deg);
    right: 3px;
    top: 0px;
    left: 3px;
}

.chevron-left-col3 {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 12px;
    height: 12px;
}
.chevron-left-col3::after {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute;
    width: 10px;
    height: 10px;
    border-bottom: 2px solid #98abcf;
    border-right: 2px solid #98abcf;
    transform: rotate(135deg);
    right: 3px;
    top: 0px;
    left: 3px;
}

</style>