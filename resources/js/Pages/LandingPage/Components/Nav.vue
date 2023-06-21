<script setup>
import { Link } from '@inertiajs/vue3'
import { usePage } from '@inertiajs/vue3'

import { SearchIcon, UserIcon, ShoppingCartIcon } from '@heroicons/vue/outline'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'

const user = usePage().props.auth.user

const props = defineProps({
    cart_count: Number
})

</script>

<template>
    <nav class="w-full px-2 md:px-24 py-4 flex items-center justify-between">
        <Link 
            class="flex items-center justify-between"
            :href="route('index')"
        >
            <div id="logo" class="text-bold flex items-center gap-2 mr-8">
                <ApplicationLogo aria-hidden="true" class="w-10 h-auto" />
                <span class="font-bold text-orange-500 text-xl">Shopcart</span>
            </div>
        </Link>
        <div class="hidden md:flex items-center justify-between">
            <div id="search" class="bg-gray-300/25 mr-8 px-2 rounded-xl flex items-center">
                <input class="bg-transparent border-0 focus:border-0 focus:ring-0 focus:outline-0" type="text" placeholder="Search Product">
                <SearchIcon aria-hidden="true" class="w-6 h-6" />
            </div>
            <div id="account" class="mr-8 flex items-center cursor-pointer">
                <UserIcon aria-hidden="true" class="w-6 h-6" />
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button
                                type="button"
                                class="inline-flex items-center px-3 py-2 font-medium leading-4 transition duration-150 ease-in-out bg-white border border-transparent rounded-md"
                            >
                                {{ user?.name ?? 'Account' }}

                                <svg
                                    class="ml-2 -mr-0.5 h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <DropdownLink
                            v-if="!user"
                            :href="route('login')"
                        >
                            Log in
                        </DropdownLink>

                         <DropdownLink
                            v-if="user"
                            :href="route('profile.edit')"
                        >
                            Dashboard
                        </DropdownLink>

                        <DropdownLink
                            v-if="user"
                            :href="route('logout')"
                            method="post"
                            as="button"
                        >
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
            <Link 
                id="cart" 
                class="relative cursor-pointer"
                :href="route('cart')"
            >
                <div v-if="cart_count" class="absolute -top-4 -right-4 z-10">
                    <span class="px-2 py-1 bg-red-500 text-xs text-white rounded-full">{{ cart_count }}</span>
                </div>
                <div class="z-20 relative flex items-center">
                    <ShoppingCartIcon aria-hidden="true" class="w-6 h-6" />
                    <p>Cart</p>
                </div>
            </Link>

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