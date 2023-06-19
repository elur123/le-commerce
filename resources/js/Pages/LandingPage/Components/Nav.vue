<script setup>
import { Link } from '@inertiajs/vue3'
import { SearchIcon, UserIcon, ShoppingCartIcon } from '@heroicons/vue/outline'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'

</script>

<template>
    <nav class="w-full px-2 md:px-24 py-4 flex items-center justify-between">
        <div class="flex items-center justify-between">
            <div id="logo" class="text-bold flex items-center gap-2 mr-8">
                <ApplicationLogo aria-hidden="true" class="w-10 h-auto" />
                <span class="font-bold text-orange-500 text-xl">Shopcart</span>
            </div>
        </div>
        <div class="hidden md:flex items-center justify-between">
            <div id="search" class="bg-gray-300/25 mr-8 px-2 rounded-xl flex items-center">
                <input class="bg-transparent border-0 focus:border-0 focus:ring-0 focus:outline-0" type="text" placeholder="Search Product">
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
        <div class="md:hidden flex items-center gap-2">
            <div id="account" class="bg-gray-300/25 rounded-full p-2 flex items-center cursor-pointer">
                <SearchIcon aria-hidden="true" class="w-6 h-6" />
            </div>
            <div id="account" class="bg-gray-300/25 rounded-full p-2 flex items-center cursor-pointer">
                <UserIcon aria-hidden="true" class="w-6 h-6" />
            </div>
            <div id="cart" class="bg-gray-300/25 rounded-full p-2 flex items-center cursor-pointer">
                <ShoppingCartIcon aria-hidden="true" class="w-6 h-6" />
            </div>
        </div>
    </nav>
</template>