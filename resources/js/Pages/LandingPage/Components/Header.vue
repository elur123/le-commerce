<script setup>
import { computed, onBeforeUnmount, onMounted, reactive } from 'vue'
import { PhoneIcon } from '@heroicons/vue/outline'

import ListBox from '@/Components/ListBox.vue'
import Nav from '@/Pages/LandingPage/Components/Nav.vue'

const state = reactive({
  scrollPosition: 0
});

const handleScroll = () => {
  state.scrollPosition = window.scrollY;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onBeforeUnmount(() => {
  window.removeEventListener('scroll', handleScroll);
});

const shouldHaveScrolledBackground = computed(() => {
  return state.scrollPosition > 0;
});

</script>

<template>
    <div class="bg-orange-500" id="top-nav">
        <div class="px-2 py-2 md:px-24 flex justify-between items-center overflow-hidden">
            <div class="text-white text-[0.45rem] md:text-sm flex items-center gap-2">
                <PhoneIcon
                    class="flex-shrink-0 w-4 h-4"
                    aria-hidden="true"
                />
                <p>+639555347395</p>
            </div>
            <div class="text-white text-[0.45rem] md:text-sm flex items-center gap-4">
                <p class="px-4 border-r">Get 50% off on selected items</p>
                <p>Shop Now</p>
            </div>
            <div class="text-white text-[0.45rem] md:text-sm">
              <p>ruelisrael22@gmail.com</p>
            </div>
        </div>
    </div>
    <header 
        class="sticky top-0 z-20" 
        :class="{
            '': !shouldHaveScrolledBackground,
            'bg-white shadow': shouldHaveScrolledBackground
        }"
    >
        <Nav />
    </header>
</template>