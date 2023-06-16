<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'

import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { ArrowLeftIcon } from '@/Components/Icons/outline'
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import TextArea from '@/Components/TextArea.vue'
import Checkbox from '@/Components/Checkbox.vue'



const props = defineProps({
    banner: Object
})

const form = useForm({
    _method: 'put',
    image: '',
    title: props.banner.title,
    sub_title: props.banner.sub_title,
    is_display: props.banner.is_display
})
</script>

<template>
    <AuthenticatedLayout title="Banners - Create">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('settings.banners.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    Edit Banner
                </h2>

                
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <section class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Banner Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Input the banner fields needed.
                    </p>
                </header>

                <form
                    @submit.prevent="form.post(route('settings.banners.update', props.banner))"
                    class="mt-6 space-y-6"
                >

                    <div>
                        <Label for="image" value="Banner Image" />

                        <Input
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            @change="function(e) { form.image = e.target.files[0] }"
                            autocomplete="image"
                        />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div>
                        <Label for="title" value="Title" />

                        <Input
                            id="title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.title"
                            required
                            autofocus
                            autocomplete="title"
                        />

                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>

                    <div>
                        <Label for="sub_title" value="Sub title" />

                        <TextArea
                            id="sub_title"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.sub_title"
                            required
                            autofocus
                        >
                        </TextArea>

                        <InputError class="mt-2" :message="form.errors.sub_title" />
                    </div>

                    <div class="flex items-center gap-4">

                        <Checkbox 
                            type="checkbox"
                            class="block" 
                            v-model="form.is_display" 
                        />
                        <label class="m-0 text-sm font-medium text-gray-700 dark:text-white">Display in landing page</label>
                    </div>


                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Update</Button>

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
                </form>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
