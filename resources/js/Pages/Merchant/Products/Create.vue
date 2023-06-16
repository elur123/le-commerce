<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { verifyImage } from '@/Composables'
import { ArrowLeftIcon } from '@/Components/Icons/outline'
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { onMounted, ref, computed } from 'vue'

import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import TextArea from '@/Components/TextArea.vue'
import Select from '@/Components/Select.vue'
import ImageList from '@/Pages/Merchant/Products/Partials/ImageList.vue'


const props = defineProps({
    categories: {
        type: Array,
        default: []
    }
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

    form.images = form.images.map((item) => {
        return {
            ...item,
            isFavorite: false
        }
    })

    form.images[index].isFavorite = true

    alert('Product set to favorite')
}

const removeImage = (id) => {
    let find = form.images.find(e => e.id === id)
    let index = form.images.indexOf(find)

    form.images.splice(index, 1)

    alert('Product removed')
}

const form = useForm({
    name: '',
    description: '',
    category: '',
    initial_price: 0,
    images: [],
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
                    New Product
                </h2>

                
            </div>
        </template>

        <div class="p-6 mb-4 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <form
                @submit.prevent="form.post(route('products.store'))"
                class=""
            >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="px-4 border-r">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Product Information
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Input the product fields needed.
                            </p>
                        </header>

                        <div class="mt-4 space-y-4">
                            <div>
                                <Label for="name" value="Product name"/>

                                <Input
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div>
                                <Label for="description" value="Product description" />

                                <TextArea
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autofocus
                                    autocomplete="description"
                                >
                                </TextArea>

                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>

                            <div>
                                <Label for="category" value="Product category" />

                                <Select
                                    id="category"
                                    class="mt-1 block w-full"
                                    :options="props.categories"
                                    v-model="form.category"
                                    required
                                    autofocus
                                    autocomplete="category"
                                />

                                <InputError class="mt-2" :message="form.errors.category" />
                            </div>

                            <div>
                                <Label for="initial_price" value="Initial price"/>

                                <Input
                                    id="initial_price"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.initial_price"
                                    required
                                    autofocus
                                    autocomplete="initial_price"
                                />

                                <InputError class="mt-2" :message="form.errors.initial_price" />
                            </div>
                        </div>
                    </div>
                    <div class="px-4 overflow-hidden oveflow-y-auto">
                        <header class="mb-4 border-b">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Product Images
                            </h2>
                            

                            <div>
                                <Label for="image" value="Upload new image" />

                                <Input
                                    id="image"
                                    type="file"
                                    class="mt-1 block w-full"
                                    ref="image"
                                    @change="uploadImage"
                                    autocomplete="image"
                                />

                                <InputError class="mt-2" :message="form.errors.images" />
                            </div>
                        </header>

                        <div class="w-full h-96 overflow-y-auto" id="images-wrapper">

                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                <ImageList 
                                    :productImages="form.images" 
                                    @setFavoriteImage="setFavoriteImage"
                                    @removeImage="removeImage"
                                    :hasFavoriteAction="true"
                                    :hasRemoveAction="true"
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
                <div class="px-4 border-top">
                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Create product</Button>

                        <Transition
                            enter-from-class="opacity-0"
                            leave-to-class="opacity-0"
                            class="transition ease-in-out"
                        >
                            <p
                                v-if="form.recentlySuccessful"
                                class="text-sm text-gray-600 dark:text-gray-400"
                            >
                                Saved.
                            </p>
                        </Transition>
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
