<template>
    <div class="pop-menu">
        <router-link to="/patients/1">
           
            <div class="pop-menu-item" style="margin-top: 0.5rem;" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Полезная информация</h4>
            </div>
            
        </router-link>
        <router-link to="/patients/2">
           
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Частные вопросы</h4>
            </div>
        </router-link>
        <router-link to="/patients/3">
        
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft class="pop-chev" color="blue"/>
                <h4>Обратиться к специалисту</h4>
            </div>
        </router-link>
        
    </div>

</template>


<script>
import ChevronRight from './ChevronRight.vue';
import ChevronLeft from './ChevronLeft.vue';

export default {
    components: {ChevronRight, ChevronLeft},
    methods: {
        close() {
            this.$emit('closePt')
        }
    }
}

</script>
<style>
</style>