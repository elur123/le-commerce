<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Table from '@/Components/Table.vue'
import { PlusIcon } from '@/Components/Icons/outline'

defineProps({
    merchants: Object,
    identifiers: Array,
    columns: Array
})

</script>

<template>
    <AuthenticatedLayout title="Merchants">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Unverefied Merchants
                </h2>
            </div>
        </template>

        <div class="relative z-auto overflow-hidden p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">

           
            <Table 
                :identifiers="identifiers" 
                :columns="columns" 
                :rows="merchants.data" 
                :pagination="merchants.links"
                :haveSearch="false" 
                :havePagination="true"
                
            />
        </div>
    </AuthenticatedLayout>
</template>
