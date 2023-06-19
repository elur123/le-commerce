<script setup>
import { onMounted, watch, ref } from 'vue'
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/scrollbar';
import { FreeMode, Scrollbar } from 'swiper';

const isMobile = ref(false)

const props = defineProps({
    class: {
        type: String,
        default: ''
    },
    data: {
        type: Array,
        default: []
    }
})

const modules = [FreeMode, Scrollbar]

onMounted(() => {
  isMobile.value = window.innerWidth < 768;

  const handleResize = () => {
    isMobile.value = window.innerWidth < 768;
  };

  window.addEventListener('resize', handleResize);

  return () => {
    window.removeEventListener('resize', handleResize);
  };
});
</script>

<template>
  <swiper
    :slidesPerView="!isMobile ? 6 : 3"
    :spaceBetween="16"
    :scrollbar="{
      hide: true,
    }"
    :modules="modules"
    :class="props.class"
    class="mySwiper"
  >
    <swiper-slide v-for="(category, index) in props.data" :key="index" class="group">
        <div class="w-full h-full relative border cursor-pointer">
            <div class="w-full h-full left-0 z-10">
                <img class="w-1/2 h-full mx-auto group-hover:drop-shadow-md" :src="category.image_url" :alt="category.label">
            </div>
            <div class="absolute bottom-0 z-20 w-full bg-gray-200/20 p-2 group-hover:bg-orange-500/20 group-hover:font-bold">
                <h3 class="">{{ category.label }}</h3>
            </div>
        </div>
    </swiper-slide>
  </swiper>
</template>
