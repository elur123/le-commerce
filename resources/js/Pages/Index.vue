<script setup>
import { Head, Link } from '@inertiajs/vue3'

import Header from '@/Pages/LandingPage/Components/Header.vue'
import Banner from '@/Pages/LandingPage/Components/Banner.vue'
import Categories from '@/Pages/LandingPage/Components/Categories.vue'
import DailyDiscover from '@/Pages/LandingPage/Components/DailyDiscover.vue'
import Footer from '@/Pages/LandingPage/Components/Footer.vue'

defineProps({
    banners: Object,
    categories: Object,
    products: Object,
    couriers: Object,
})
</script>

<template>
    <Head title="Shop now" />

    <div class="w-full h-full">
        <Header />
        <div id="main mb-8">
            <Banner 
                :banners="banners.data" 
            />
            <Categories 
                :categories="categories.data" 
            />
            <DailyDiscover
                :products="products.data"
                :links="products.links"
            />
        </div>
        <Footer
            :logistics="couriers.data" 
        />
    </div>
</template>
