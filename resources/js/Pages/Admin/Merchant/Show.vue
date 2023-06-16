<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import TableActions from '@/Components/TableActions.vue'
import { PlusIcon } from '@/Components/Icons/outline'
import Tab from '@/Components/Tab.vue'
import DocumentSubmitted from '@/Pages/Admin/Merchant/tabs/DocumentSubmitted.vue'
import Products from '@/Pages/Admin/Merchant/tabs/Products.vue'
import Orders from '@/Pages/Admin/Merchant/tabs/Orders.vue'


defineProps({
    merchant: Object,
    actions: {
        type: Array,
        default: []
    }
})

const tabs = [
    { label: 'Document submitted', slotName: 'document_submitted' },
    { label: 'Products', slotName: 'products' },
    { label: 'Orders', slotName: 'orders' }
]

</script>

<template>
    <AuthenticatedLayout title="Merchants">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Merchant Details
                </h2>
                <TableActions :actions="actions" />
            </div>
        </template>

        <div class="relative z-auto flex gap-4 overflow-hidden p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <div class="w-1/5 border-r-2">
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Fullname</label>    
                    <h3 class="">{{ merchant.user.name }}</h3>
                </div>  
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Company name</label>  
                    <h3 class="">{{ merchant.name }}</h3>  
                </div>   
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Address</label>
                    <h3 class="">{{ merchant.address }}</h3>  
                </div>   
                <div class="mb-4">
                    <label class="text-sm text-gray-500">Phone Number</label>
                    <h3 class="">{{ merchant.mobile_no }}</h3>    
                </div>   
                <div>
                    <label class="text-sm text-gray-500">Is Verified</label>
                    <h3 class="">{{ merchant.is_validated ? 'Verified' : 'Unverified' }}</h3>    
                </div>       
            </div>
            <div class="w-4/5">
                <Tab
                    :tabs="tabs"
                >
                    <template v-slot:document_submitted>
                        <DocumentSubmitted :documents="merchant.documentSubmitted" />
                    </template>

                    <template v-slot:products>
                        <Products />
                    </template>

                    <template v-slot:orders>
                        <Orders />
                    </template>
                </Tab>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
