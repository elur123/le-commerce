<script setup>
import { Head, Link } from '@inertiajs/vue3'

import Header from '@/Pages/LandingPage/Components/Header.vue'
import Banner from '@/Pages/LandingPage/Components/Banner.vue'
import Categories from '@/Pages/LandingPage/Components/Categories.vue'
import DailyDiscover from '@/Pages/LandingPage/Components/DailyDiscover.vue'
import Footer from '@/Pages/LandingPage/Components/Footer.vue'

defineProps({})
</script>

<template>
    <Head title="LE-COMMERCE" />

    <div class="w-full h-full">
        <Header />
        <div id="main mb-8">
            <Banner />
            <Categories />
            <DailyDiscover />
        </div>
        <Footer />
    </div>
</template>
