<template>
    <div class="pop-menu">
        <router-link to="/specialists/1">
            
            <div class="pop-menu-item" style="margin-top: 0.5rem;" @click="close">    
                <ChevronLeft  class="pop-chev"  color="blue"/>
                <h4>Членство</h4>
            </div>
            
        </router-link>
        <router-link to="/specialists/2">
            
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft  class="pop-chev"  color="blue"/>
                <h4>Ресурсы</h4>
            </div>
        </router-link>
        <router-link to="/specialists/3">
        
            <div class="pop-menu-item" @click="close">    
                <ChevronLeft  class="pop-chev"  color="blue"/>
                <h4>Заявка на обучение</h4>
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
            this.$emit('closeSp')
        }
    }
}

</script>
<style>
</style>