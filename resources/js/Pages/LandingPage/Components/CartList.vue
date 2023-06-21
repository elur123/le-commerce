<script setup>
import Checkbox from '@/Components/Checkbox.vue'
import Button from '@/Components/Button.vue'
import StoreCart from '@/Pages/LandingPage/Partials/StoreCart.vue'

const emit = defineEmits(['removeFromCart'])

defineProps({
    cart_count: Number,
    groupCarts: Object
})

function removeFromCart() {

    emit('removeFromCart')
}
</script>

<template>
    <div class="relative px-24 py-4">
        <div id="head" class="px-8 py-4 mb-4 bg-white">
            <ul class="text-sm text-gray-500 flex">
                <li class="w-2/6">
                    <Checkbox class="mr-2" />
                    Product
                </li>
                <li class="w-1/6">Unit Price</li>
                <li class="w-1/6">Quantity</li>
                <li class="w-1/6">Total Price</li>
                <li class="w-1/6 text-center">Actions</li>
            </ul>
        </div>

        <div id="body" class="">
            
            <StoreCart 
                v-for="(product, storeName) in groupCarts"
                :key="storeName"
                :storeName="storeName"
                :products="product.data"
                @removeFromCart="removeFromCart"
            />
        </div>

        <div id="foot" class="px-8 py-4 bg-white sticky bottom-0">
            <div class="before:content-[''] before:absolute before:-top-5 before:left-0 before:h-5 before:w-full before:bg-[linear-gradient(transparent,rgba(0,0,0,.06))]"></div>
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <div class="flex items-center">
                        <Checkbox id="select-all" class="mr-2" />
                        <label for="select-all" class="m-0 cursor-pointer">Select all <span>({{ cart_count }})</span></label>
                    </div>
                    <div>
                        <span>Delete</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div>
                        <p>Total ({{ cart_count }} {{ cart_count > 1 ? 'items' : 'item' }}): 1,000</p>
                        <!-- <p class="text-right">Saved 0.00</p> -->
                    </div>
                    <div>
                        <Button
                            variant="primary"
                            class="px-16 my-2"
                        >
                            Checkout
                        </Button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>