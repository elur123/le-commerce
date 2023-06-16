<script setup>
import { Head, Link } from '@inertiajs/vue3'
import Stepper from '@/Pages/Merchant/Registration/Partials/Stepper.vue'

defineProps({
    step: Number,
    documents: {
        type: Array,
        default: []
    }
})
</script>

<template>
    <Head title="Merchant Information" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-dark-eval-0 dark:text-gray-200 sm:items-center sm:pt-0">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h3 class="text-3xl font-bold uppercase mb-4">Merchant Registration</h3>
            <Stepper 
                class="" 
                :step="step"
                :documents="documents"
            />
        </div>
    </div>
</template>
