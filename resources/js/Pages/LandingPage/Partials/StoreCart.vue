<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import ProductCart from '@/Pages/LandingPage/Partials/ProductCart.vue'

const emit = defineEmits(['removeFromCart'])

defineProps({
    storeName: String,
    products: {
        type: Array,
        default: []
    }
})

function removeFromCart() {

    emit('removeFromCart')
}
</script>


<template>
    <div id="product-cart" class="mb-4 bg-white">
        <div id="head" class="px-8 py-4 border-b flex items-center">
            <Checkbox class="mr-2" />
            <h3 class="font-bold">{{ storeName }}</h3>
        </div>
        <div id="body" class="px-8 py-4">
            <ProductCart 
                v-for="(product, index) in products"
                :key="product.id"
                :isLast="products.length - 1 === index"
                :details="product"
                @removeFromCart="removeFromCart"
            />
        </div>
    </div>
</template>