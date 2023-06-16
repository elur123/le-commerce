<script setup>
import { Link } from '@inertiajs/vue3'
import { SearchIcon, UserIcon, ShoppingCartIcon } from '@heroicons/vue/outline'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

</script>

<template>
    <nav class="w-full px-24 py-4 flex items-center justify-between">
        <div class="flex items-center justify-between">
            <div id="logo" class="text-bold flex items-center gap-2 mr-8">
                <ApplicationLogo aria-hidden="true" class="w-10 h-auto" />
                <span class="font-bold text-orange-500 text-xl">Shopcart</span>
            </div>
            <ul class="">
                <li class="inline px-4">
                    <Link href="">Categories</Link>
                </li>
                <li class="inline px-4">
                    <Link href="">Stores</Link>
                </li>
                <li class="inline px-4">
                    <Link href="">What's New</Link>
                </li>
                <li class="inline px-4">
                    <Link href="">Delivery</Link>
                </li>
            </ul>
        </div>
        <div class="flex items-center justify-between">
            <div id="search" class="bg-gray-200 mr-8 px-2 rounded-xl flex items-center">
                <input class="bg-transparent border-0" type="text" placeholder="Search Product">
                <SearchIcon aria-hidden="true" class="w-6 h-6" />
            </div>
            <div id="account" class="mr-8 flex items-center cursor-pointer">
                <UserIcon aria-hidden="true" class="w-6 h-6" />
                <p>Account</p>
            </div>
            <div id="cart" class="mr-8 flex items-center cursor-pointer">
                <ShoppingCartIcon aria-hidden="true" class="w-6 h-6" />
                <p>Cart</p>
            </div>
        </div>
    </nav>
</template>