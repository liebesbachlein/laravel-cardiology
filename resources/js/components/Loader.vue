<template>
<div class="loader-box">
    <span class="loader"></span>
</div>


</template>

<style>

.loader-box {
    width: 100%;
    padding: 2rem 0;
    display: flex;
    justify-content: center;
}

.loader {
    width: 48px;
    height: 48px;
    border: 5px solid var(--component-accent-color2);
    border-bottom-color: transparent;
    border-radius: 50%;
    display: inline-block;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
    }

    @keyframes rotation {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    } 
</style>