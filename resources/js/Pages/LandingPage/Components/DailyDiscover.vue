<script setup>
import { HeartIcon } from '@heroicons/vue/outline'

import Ratings from '@/Components/Ratings.vue'
import Button from '@/Components/Button.vue'

</script>

<template>
    <div id="products" class="w-full my-8 px-24">
        <h3 class="text-2xl font-bold mb-8">DAILY DISCOVER</h3>
        <div id="list">
            <div class="grid grid-cols-4 gap-4">
                <div id="product">
                    <div id="head" class="relative h-60 rounded-lg bg-gray-300">
                        <div class="absolute p-2 top-4 right-4 bg-white rounded-full cursor-pointer">
                            <HeartIcon
                                class="flex-shrink-0 w-4 h-4"
                                aria-hidden="true"
                            />
                        </div>
                    </div>
                    <div id="body" class="py-2 space-y-2">
                        <div class="font-bold flex items-center justify-between">
                            <h3>Product name</h3>
                            <p>89.00</p>
                        </div>
                        <div id="details">
                            <p>Product details lorem lorem lorem ....</p>
                        </div>
                        <div id="ratings">
                            <Ratings />
                        </div>
                        <div id="actions">
                            <Button
                                class="border-2 border-gray-600 rounded-xl"
                                variant="none"
                            >
                                Add to Cart
                            </Button>
                        </div>
                    </div>
                </div>
                <div id="product">
                    <div id="head" class="relative h-60 rounded-lg bg-gray-300">
                        <div class="absolute p-2 top-4 right-4 bg-white rounded-full cursor-pointer">
                            <HeartIcon
                                class="flex-shrink-0 w-4 h-4"
                                aria-hidden="true"
                            />
                        </div>
                    </div>
                    <div id="body" class="py-2 space-y-2">
                        <div class="font-bold flex items-center justify-between">
                            <h3>Product name</h3>
                            <p>89.00</p>
                        </div>
                        <div id="details">
                            <p>Product details lorem lorem lorem ....</p>
                        </div>
                        <div id="ratings">
                            <Ratings />
                        </div>
                        <div id="actions">
                            <Button
                                class="border-2 border-gray-600 rounded-xl"
                                variant="none"
                            >
                                Add to Cart
                            </Button>
                        </div>
                    </div>
                </div>
                <div id="product">
                    <div id="head" class="relative h-60 rounded-lg bg-gray-300">
                        <div class="absolute p-2 top-4 right-4 bg-white rounded-full cursor-pointer">
                            <HeartIcon
                                class="flex-shrink-0 w-4 h-4"
                                aria-hidden="true"
                            />
                        </div>
                    </div>
                    <div id="body" class="py-2 space-y-2">
                        <div class="font-bold flex items-center justify-between">
                            <h3>Product name</h3>
                            <p>89.00</p>
                        </div>
                        <div id="details">
                            <p>Product details lorem lorem lorem ....</p>
                        </div>
                        <div id="ratings">
                            <Ratings />
                        </div>
                        <div id="actions">
                            <Button
                                class="border-2 border-gray-600 rounded-xl"
                                variant="none"
                            >
                                Add to Cart
                            </Button>
                        </div>
                    </div>
                </div>
                <div id="product">
                    <div id="head" class="relative h-60 rounded-lg bg-gray-300">
                        <div class="absolute p-2 top-4 right-4 bg-white rounded-full cursor-pointer">
                            <HeartIcon
                                class="flex-shrink-0 w-4 h-4"
                                aria-hidden="true"
                            />
                        </div>
                    </div>
                    <div id="body" class="py-2 space-y-2">
                        <div class="font-bold flex items-center justify-between">
                            <h3>Product name</h3>
                            <p>89.00</p>
                        </div>
                        <div id="details">
                            <p>Product details lorem lorem lorem ....</p>
                        </div>
                        <div id="ratings">
                            <Ratings />
                        </div>
                        <div id="actions">
                            <Button
                                class="border-2 border-gray-600 rounded-xl"
                                variant="none"
                            >
                                Add to Cart
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>