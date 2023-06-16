<script setup>
import InformationForm from '@/Pages/Merchant/Registration/Partials/InformationForm.vue'
import DocumentationForm from '@/Pages/Merchant/Registration/Partials/DocumentationForm.vue'


const props = defineProps({
    step: Number,
    documents: Array
})
</script>

<template>
    
    <ol class="flex items-center w-full mb-4 sm:mb-5">
        <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-orange-500 after:border-4 after:inline-block dark:after:border-orange-500">
            <div class="flex items-center justify-center w-10 h-10 bg-orange-500 rounded-full lg:h-12 lg:w-12 dark:bg-orange-500 shrink-0">
                <svg aria-hidden="true" class="w-5 h-5 text-white lg:w-6 lg:h-6 dark:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </div>
        </li>
        <li class="flex items-center w-full">
            <div class="flex items-center justify-center w-10 h-10 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0" :class="step === 2 ? 'bg-orange-500' : 'bg-gray-500'">
                <svg aria-hidden="true" class="w-5 h-5 text-white lg:w-6 lg:h-6 dark:text-gray-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            </div>
        </li>
    </ol>
    
    <InformationForm v-if="step === 1" />
    <DocumentationForm v-if="step === 2" :documents="documents" />
</template>