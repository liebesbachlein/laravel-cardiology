<template>
    <div class="date-total" v-if="date2 != ''">
        <div class="date-outer">
            <div class="date-inner">
                {{ date1 }}
            </div>
        </div>

        <div class="date-dash">—</div>

        <div class="date-outer">
            <div class="date-inner">
                {{ date2 }}
            </div>
        </div>

        <div class="indicator-month">
            {{ month }}
        </div>
    </div>

    <div class="date-total" v-else>
        <div class="date-outer">
            <div class="date-inner">
                {{ date1 }}
            </div>

        </div>
        <div class="indicator-month">
            {{ month }}
        </div>


    </div>
</template>

<script>
export default {
    props: ['date1', 'date2', 'month']
}

</script>


<style>
.date-total {
    display: flex;
    align-items: center;
}

.date-outer {
    display: inline-flex;
    align-items: flex-end;
    justify-content: center;
    background-color: var(--bright-red);
    padding-top: 0.25rem;
    border-radius: 0.25rem 0.25rem 0 0;
    box-shadow: 1px 1px 3px 0px rgba(154, 150, 150, 0.3);
    
}

.date-inner {
    background-color: #FFF;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 0.15rem 0.15rem 0 0;
    font-size: 1rem;
    font-weight: 600;
    width: 1.75rem;
    height: 1.75rem;
}

.date-total .indicator-month, .date-dash {
    margin: 0 0.5rem;
    padding-top: 0.25rem;
    font-size: 1rem;
    font-weight: 600;
    color: #2D2D2D
}

@media only screen and (min-width: 1024px) {
    .date-outer {
    
    box-shadow: 1px 1px 5px 0px rgba(154, 150, 150, 0.4);
    }
}


</style>