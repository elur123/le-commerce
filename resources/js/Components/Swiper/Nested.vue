<script setup>
import "swiper/css";
import "swiper/css/pagination"

import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination } from "swiper";

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

const modules = [Pagination]
</script>

<template>
  <swiper
    class="mySwiper swiper-h"
    :class="props.class"
    :spaceBetween="50"
    :pagination="{
      clickable: true,
    }"
    :modules="modules"
  >
    <swiper-slide v-for="(banner, index) in props.data" :key="index">
        <div class="relative h-full w-full flex items-center">
            <div class="absolute top-0 left-0 w-full h-full z-10">  
              <img class="h-full w-full" :src="banner.image_url" :alt="banner.image">
            </div>
            <div class="w-full h-full px-24 z-20 bg-gray-900/70 flex items-center">
              <h1 class="uppercase text-white text-4xl font-bold">{{ banner.title }}</h1>
            </div>
        </div>
    </swiper-slide>
  </swiper>
</template>

<style>
:root {
  --swiper-theme-color: #f97316; /* Set the new theme color */
}
</style>
