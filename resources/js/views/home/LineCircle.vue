<template>
    <div class="linecircle">
        <div class="linecircle_line"></div>
        <div class="linecircle_circle"></div>
    </div>
</template>

<style>

@media only screen and (max-width: 768px) {
.linecircle {
   display: grid;
   width: 51px;
   align-items: center;
   justify-content: center;
}

.linecircle_line {
    grid-row: 1;
    grid-column: 1;
    height: 100%;
    border-left: 1px solid var(--component-accent-color2);
    width: 1px;
    position: relative;
    left: 5px;
}

.linecircle_circle {
    grid-row: 1;
    grid-column: 1;
    height: 10px;
    width: 11px;
    border-radius: 5px;
    background-color: transparent;
    border: 1px solid transparent;}
}

@media only screen and (min-width: 1023px) {
.linecircle {
   display: grid;
   width: 51px;
   align-items: center;
   justify-content: center;
}

.linecircle_line {
    grid-row: 1;
    grid-column: 1;
    height: 100%;
    border-left: 1px solid var(--component-accent-color2);
    width: 1px;
    position: relative;
    left: 5px;
}

.linecircle_circle {
    grid-row: 1;
    grid-column: 1;
    height: 10px;
    width: 11px;
    border-radius: 5px;
    background-color: transparent;
    border: 1px solid transparent;}
}

@media only screen and (min-width: 1024px) {

.linecircle {
   display: grid;
   width: 81px;
   align-items: center;
   justify-content: center;
}

.linecircle_line {
    grid-row: 1;
    grid-column: 1;
    height: 100%;
    border-left: 1px solid var(--component-accent-color2);
    width: 1px;
    position: relative;
    left: 5px;
}

.linecircle_circle {
    grid-row: 1;
    grid-column: 1;
    height: 10px;
    width: 11px;
    border-radius: 5px;
    background-color: transparent;
    border: 1px solid transparent;
    z-index: 5;
}

}

</style>