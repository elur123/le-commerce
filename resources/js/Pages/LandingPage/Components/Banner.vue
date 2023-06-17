<script setup>
import Nested from '@/Components/Swiper/Nested.vue'

defineProps({
    banners: {
        type: Array,
        default: []
    }
})
</script>


<template>
    <div id="banner" class="w-full z-10 h-80 px-24">
        <Nested 
            :data="banners"
            class="h-full" 
        />
    </div>
</template>