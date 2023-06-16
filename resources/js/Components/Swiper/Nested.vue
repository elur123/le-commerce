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
    <swiper-slide>
        <div class="h-full w-full px-24 bg-orange-200 flex items-center">
            <h1 class="">Horizontal Slide 1</h1>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="h-full w-full px-24 bg-orange-200 flex items-center">
            <h1 class="">Horizontal Slide 2</h1>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="h-full w-full px-24 bg-orange-200 flex items-center">
            <h1 class="">Horizontal Slide 3</h1>
        </div>
    </swiper-slide>
  </swiper>
</template>

<script setup>
import "swiper/css";
import "swiper/css/pagination"

import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination } from "swiper";

const props = defineProps({
    class: {
        type: String,
        default: ''
    }
})

const modules = [Pagination]
</script>

<style>
:root {
  --swiper-theme-color: #f97316; /* Set the new theme color */
}
</style>
