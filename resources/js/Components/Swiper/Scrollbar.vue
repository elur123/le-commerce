<template>
  <swiper
    :slidesPerView="4"
    :spaceBetween="16"
    :scrollbar="{
      hide: true,
    }"
    :modules="modules"
    :class="props.class"
    class="mySwiper"
  >
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
    <swiper-slide>
        <div class="w-full h-full border grid place-content-center cursor-pointer">
            <h3>Category 1</h3>
        </div>
    </swiper-slide>
  </swiper>
</template>

<script setup>
    // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';
    // Import Swiper styles
    import 'swiper/css';
    import 'swiper/css/scrollbar';

    // import required modules
    import { FreeMode, Scrollbar } from 'swiper';

    const props = defineProps({
        class: {
            type: String,
            default: ''
        }
    })

    const modules = [FreeMode, Scrollbar]
</script>
