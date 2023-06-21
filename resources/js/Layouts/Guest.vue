<script setup>
import { Head, Link } from '@inertiajs/vue3'

import Header from '@/Pages/LandingPage/Components/Header.vue'
import Footer from '@/Pages/LandingPage/Components/Footer.vue'

defineProps({
    title: String,
    cart_count: Number,
    couriers: Object,
})
</script>

<template>
    <Head :title="title" />

    <div class="w-full h-full">
        <Header 
            :cart_count="cart_count"
        />
        <div id="main mb-8">
            <slot />
        </div>
        <Footer
            :logistics="couriers.data" 
        />
    </div>
</template>
