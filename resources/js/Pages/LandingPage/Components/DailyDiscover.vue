<script setup>
import { usePage, router } from '@inertiajs/vue3'
import axios from 'axios'

import Alert from '@/Services/SweetAlert'
import Product from '@/Pages/LandingPage/Partials/Product.vue'
import Button from '@/Components/Button.vue'

const filter = usePage().props.filter
const meta = usePage().props.products.meta

let page = filter.page ?? 2

const { products } = defineProps({
    products: {
        type: Array,
        default: []
    }
})

const addToCart = (data) => {

    router.post(route('carts.store'), 
        { 
            'store_product_id': data.id,
            'price': data.price,
            'quantity': 1
        }, 
        {
            preserveScroll: true,
            onSuccess: res => {
                if (res.props.flash.status) {
                    Alert('success', 'Product added to cart')
                }

            }
    })
}

const loadMore = async () => {

    await axios.get(`${filter.url}?page=${page}`).then(res => {
        products.push(...res.data.products)
    })

    page += 1
}

</script>

<template>
    <div id="products" class="w-full my-8 px-2 md:px-24">
        <h3 class="text-2xl font-bold mb-8">DAILY DISCOVER</h3>
        <div id="list" class="">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <Product 
                    v-for="(product, index) in products" 
                    :key="index" 
                    :details="product"
                    @addToCart="addToCart"
                />
            </div>
        </div>
        <div v-if="page !== meta.last_page && meta.last_page !== 1" class="grid place-content-center mt-8">
            <Button 
                variant="none" 
                class="border border-gray-500 px-4 py-2 rounded-xl hover:bg-orange-500 hover:text-white hover:border-orange-500"
                @click="loadMore"
            >
                Load more...
            </Button>
        </div>
    </div>
</template>