<script setup>
import { HeartIcon } from '@heroicons/vue/outline'

import Ratings from '@/Components/Ratings.vue'
import Button from '@/Components/Button.vue'

const props = defineProps({
    details: Object
})
</script>
<template>
    <div id="product" class="cursor-pointer group">
        <div id="head" class="relative h-60 rounded-lg bg-gray-300 overflow-hidden">
            <div class="absolute p-2 top-4 right-4 bg-white rounded-full cursor-pointer">
                <HeartIcon
                    class="flex-shrink-0 w-4 h-4"
                    aria-hidden="true"
                />
            </div>
            <img class="w-full h-full" :src="details.product.image_url" :alt="details.product.name">
        </div>
        <div id="body" class="py-2 space-y-2">
            <div class="font-bold flex items-center justify-between">
                <h3>{{ details.product.name }}</h3>
                <p>{{ details.price }}</p>
            </div>
            <div id="details">
                <p>{{ details.product.description }}</p>
            </div>
            <div id="ratings">
                <Ratings />
            </div>
            <div id="actions">
                <Button
                    class="border-2 border-gray-600 rounded-xl hover:bg-orange-500 hover:text-white hover:border-orange-500"
                    variant="none"
                >
                    Add to Cart
                </Button>
            </div>
        </div>
    </div>
</template>