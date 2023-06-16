<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import Button from '@/Components/Button.vue'
import Table from '@/Components/Table.vue'
import { PlusIcon } from '@/Components/Icons/outline'

defineProps({
    couriers: Array,
    search: Object,
    identifiers: Array,
    columns: Array
})

</script>

<template>
    <AuthenticatedLayout title="Couriers">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <h2 class="text-xl font-semibold leading-tight">
                    Couriers
                </h2>

                <Button
                    variant="primary"
                    class="items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('couriers.create')"
                >
                    <PlusIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>New Courier</span>
                </Button>
            </div>
        </template>

        <div class="relative z-auto overflow-hidden p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">

           <Table 
                :search="search" 
                placeHolder="Search courier..."
                :identifiers="identifiers" 
                :columns="columns" 
                :rows="couriers.data" 
                :pagination="couriers.meta.links"
                :haveSearch="true" 
                :havePagination="true"
            />

        </div>
    </AuthenticatedLayout>
</template>
