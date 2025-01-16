<script setup>
import { Link, router } from '@inertiajs/vue3';
import UserLayouts from './Layouts/UserLayouts.vue';
import Hero from './Layouts/Hero.vue';
import Products from '../User/Components/Products.vue'
//products list 
defineProps({
    products: Array
})


</script>
<template>
    <UserLayouts>
        <!-- here section  -->
        <Hero></Hero>
        <!-- end -->
        <div class="bg-white">
        </div>
    </UserLayouts>
</template>


