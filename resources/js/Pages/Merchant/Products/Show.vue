<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { verifyImage } from '@/Composables'
import { ArrowLeftIcon } from '@/Components/Icons/outline'
import { Link, useForm, usePage, router } from '@inertiajs/vue3'
import { onMounted, ref, computed } from 'vue'

import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import TextArea from '@/Components/TextArea.vue'
import Select from '@/Components/Select.vue'
import ImageList from '@/Pages/Merchant/Products/Partials/ImageList.vue'


const props = defineProps({
    product: Object
})

const image = ref();
let photosLoaded = ref(false),
    masonry = ref(null)

const uploadImage = (e) => {
    photosLoaded.value = false

    let file = e.target.files[0]
    if (!verifyImage(file.type)) 
    {
        alert('Upload image only')
        e.target.value = ''
        image.value = ''
        return;
    }

    alert('Image added')
    form.images.push({
        id: form.images.length,
        file: file,
        url: URL.createObjectURL(file),
        isFavorite: false
    })

    e.target.value = ''
    image.value = ''
    photosLoaded.value = true
}

const setFavoriteImage = (id) => {
    let find = form.images.find(e => e.id === id)
    let index = form.images.indexOf(find)
    let image = form.images[index]

    form.images = form.images.map((item) => {
        return {
            ...item,
            isFavorite: false
        }
    })

    if (typeof image.actions !== 'undefined') 
    {
        router.put(image.actions.setFavorite)
    }

    form.images[index].isFavorite = true

    alert('Product set to featured image')
}

const removeImage = (id) => {
    let find = form.images.find(e => e.id === id)
    let index = form.images.indexOf(find)
    let image = form.images[index]

    form.images.splice(index, 1)

    if (typeof image.actions !== 'undefined') 
    {
        router.delete(image.actions.remove)
    }

    alert('Product removed')
}

const form = useForm({
    _method: 'put',
    name: props.product.name,
    description: props.product.description,
    category: props.product.category,
    initial_price: props.product.initial_price,
    images: props.product.productImages,
})

const chunkedImages = computed(() => {

    const chunkSize = 3;
    const images = form.images || [];
    const chunks = [];

    for (let i = 0; i < images.length; i += chunkSize) {
      chunks.push(images.slice(i, i + chunkSize));
    }
    return chunks;
})

</script>

<template>
    <AuthenticatedLayout title="Product">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('products.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    Product Details
                </h2>

                
            </div>
        </template>

        <div class="p-6 mb-4 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <form
                @submit.prevent="form.post(route('products.update', props.product))"
                class=""
            >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="px-4 border-r">
        
                        <div class="w-full h-full">
                           <div id="product-details">
                                <div id="header" class="mb-4 text-center">
                                    <div id="image-container" class="w-40 h-40 mx-auto rounded-full">
                                        <img class="w-full h-full" :src="props.product.featuredUrl" alt="">
                                    </div>
                                    <h3 class="text-xl font-bold uppercase">{{ props.product.name }}</h3>
                                    <p class="text-sm text-gray-500">{{ props.product.category.label }}</p>
                                </div>
                                <div id="body" class="my-4 p-4">
                                    <div id="description" class="pb-4">
                                        <p class="text-sm text-gray-500 mb-2">Description:</p>
                                        <p class="indent-8">{{ props.product.description  }}</p>
                                    </div>
                                    <div id="price" class="py-4">
                                        <p class="text-sm text-gray-500 mb-2">Initial Price:</p>
                                        <p class="indent-8">{{ props.product.initial_price  }}</p>
                                    </div>
                                </div>
                           </div>
                        </div>

                    </div>

                    <div class="px-4 overflow-hidden oveflow-y-auto">
                        <header class="mb-4">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Product Images
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                List of product images. Can set to featured image.
                            </p>
                        </header>

                        <div class="w-full h-96 overflow-y-auto" id="images-wrapper">

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <ImageList 
                                    :productImages="form.images" 
                                    @setFavoriteImage="setFavoriteImage"
                                    @removeImage="removeImage"
                                    :hasFavoriteAction="true"
                                    :hasRemoveAction="false"
                                />
                            </div>
                            <div v-if="!form.images.length" class="flex justify-center">
                                <div class="py-6">
                                    <div>
                                        No image uploaded
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
