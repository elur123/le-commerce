<script setup>
import { Head, Link } from '@inertiajs/vue3'

import Guest from '@/Layouts/Guest.vue'
import Header from '@/Pages/LandingPage/Components/Header.vue'
import Banner from '@/Pages/LandingPage/Components/Banner.vue'
import Categories from '@/Pages/LandingPage/Components/Categories.vue'
import DailyDiscover from '@/Pages/LandingPage/Components/DailyDiscover.vue'
import Footer from '@/Pages/LandingPage/Components/Footer.vue'

defineProps({
    cart_count: Number,
    banners: Object,
    categories: Object,
    products: Object,
    couriers: Object,
})
</script>

<template>
    <Guest
        title="Shop now"
        :cart_count="cart_count"
        :couriers="couriers"
    >
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
    </Guest>
</template>
