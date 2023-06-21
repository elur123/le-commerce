<script setup>
import { Head, Link } from '@inertiajs/vue3'
import Alert from '@/Services/SweetAlert'

import Guest from '@/Layouts/Guest.vue'
import Header from '@/Pages/LandingPage/Components/Header.vue'
import CartList from '@/Pages/LandingPage/Components/CartList.vue'
import Footer from '@/Pages/LandingPage/Components/Footer.vue'

defineProps({
    cart_count: Object,
    groupCarts: Object,
    couriers: Object,
})

function removeFromCart() {

    Alert('success', 'Successfully removed from cart')
}
</script>

<template>
    <Guest
        title="Cart"
        :cart_count="cart_count"
        :couriers="couriers"
    >
        <div class="w-full h-full bg-gray-100">
            <CartList 
                :cart_count="cart_count"
                :groupCarts="groupCarts"
                @removeFromCart="removeFromCart"
            />
        </div>
    </Guest>
</template>
