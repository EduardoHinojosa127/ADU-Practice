<script setup>
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Header from './Header.vue';
import Footer from './Footer.vue';
import Hero from './Hero.vue';

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})



</script>
<template>
    <!-- header -->
    <Header></Header>
    <!-- end -->
    <!-- main content -->
    
    <div class="max-w-screen-xl mx-auto">
        <slot />
    </div>
    <!-- end -->
    <!-- footer -->

    <Footer></Footer>

    <!-- end -->
</template>
