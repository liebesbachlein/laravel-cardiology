<template>
    <div class="site-content">
      <div class="site-content-in">
        <div class="not-found">
            <h1>Error 404</h1>
            <h1>Page not found ...</h1>
        </div>
    </div>
    <Footer/>
    </div>
</template>


<script>
import Footer from '@/components/Footer.vue';
export default {
  name: 'NotFound',
  components: {Footer}
}

</script>

<style>
.not-found {
    margin: 8rem 0 8rem 0;
}

</style>