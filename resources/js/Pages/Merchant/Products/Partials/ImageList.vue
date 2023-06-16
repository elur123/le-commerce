<script setup>
import { Link } from '@inertiajs/vue3'
import { HeartIcon, TrashIcon } from '@heroicons/vue/solid'
import { computed } from 'vue'

const emit = defineEmits(['setFavoriteImage', 'removeImage'])

const props = defineProps({
    productImages: {
        type: Array,
        default: []
    },
    hasFavoriteAction: {
        type: Boolean,
        default: false,
    },
    hasRemoveAction: {
        type: Boolean,
        default: false,
    },
})

const chunkedImages = computed(() => {

    const chunkSize = 3;
    const images = props.productImages || [];
    const chunks = [];

    for (let i = 0; i < images.length; i += chunkSize) {
      chunks.push(images.slice(i, i + chunkSize));
    }
    return chunks;
})

const setFavoriteImage = (id) => {
    emit('setFavoriteImage', id)
}

const removeImage = (id) => {
    emit('removeImage', id)
}

</script>

<template>
    <template v-for="(chunk, chunkIndex) in chunkedImages" :key="chunkIndex">
        <div class="grid gap-4">
            <div v-for="(image, imageIndex) in chunk" :key="imageIndex" class="overflow-hidden relative bg-gray-100 rounded-lg grid place-content-center cursor-pointer group">
                <div v-if="hasFavoriteAction" class="w-full absolute z-10 top-0 left-0">
                    <Link
                        class="p-1"
                        as="button" 
                        type="button"
                        @click="setFavoriteImage(image.id)"
                        preserve-scroll 
                        preserve-state
                    >
                        <HeartIcon :class="{ 'text-red-500': image.isFavorite, 'text-gray-500': !image.isFavorite }" class="h-6 w-6" />
                    </Link>
                </div>
                <img :src="image.url" class="z-0 h-auto max-w-full rounded-lg transition ease-in-out group-hover:scale-125"/>
                <div v-if="hasRemoveAction" class="w-full absolute z-10 bottom-0 left-0 text-right">
                    <Link
                        class="p-1"
                        as="button" 
                        type="button"
                        @click="removeImage(image.id)"
                        preserve-scroll 
                        preserve-state
                    >
                        <TrashIcon class="h-6 w-6 text-gray-500" />
                    </Link>
                </div>
            </div>
        </div>
    </template>
</template>