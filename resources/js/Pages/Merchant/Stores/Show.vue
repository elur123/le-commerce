<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { ArrowLeftIcon } from '@/Components/Icons/outline'

import Button from '@/Components/Button.vue'
import Tab from '@/Components/Tab.vue'
import Products from '@/Pages/Merchant/Stores/tabs/Products.vue'

const props = defineProps({
    store: Object,
    products: Array
})

const tabs = [
    { label: 'Products', slotName: 'products' },
    { label: 'Orders', slotName: 'orders' }
]
</script>

<template>
    <AuthenticatedLayout title="Store">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('stores.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    Store Details
                </h2>

                
            </div>
        </template>

        <div class="p-6 mb-4 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="flex gap-4">
                <div class="w-1/6 px-4 border-r">
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Store name</p>
                        <h3 class="pl-2 border-l-2 border-orange-500">{{ props.store.name }}</h3>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Store address</p>
                        <h3 class="pl-2 border-l-2 border-orange-500">{{ props.store.address }}</h3>
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-500">Store mobile #</p>
                        <h3 class="pl-2 border-l-2 border-orange-500">{{ props.store.mobile_no }}</h3>
                    </div>
                </div>
                <div class="w-5/6 px-4">
                    <Tab
                        :tabs="tabs"
                    >
                        <template v-slot:products>
                            <Products 
                                :store="props.store"
                                :products="props.store.storeProducts" 
                                :availableProducts="props.products"
                            />
                        </template>

                        <template v-slot:orders>
                            <!-- <Orders /> -->
                        </template>
                    </Tab>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>