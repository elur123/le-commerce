<script setup>
import Scrollbar from '@/Components/Swiper/Scrollbar.vue'

defineProps({
    categories: {
        type: Array,
        default: []
    }
})
</script>
<template>
    <div id="categories" class="w-full h-40 my-8 px-2 md:px-24">
        <Scrollbar 
            :data="categories"
            class="h-full" 
        />
    </div>
</template>