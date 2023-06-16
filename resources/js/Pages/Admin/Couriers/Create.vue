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
import ImageList from '@/Pages/Merchant/Products/Partials/ImageList.vue'


const props = defineProps({})

const form = useForm({
    image: '',
    name: '',
    email: '',
    contact_no: '',
    address: '',
})

</script>

<template>
    <AuthenticatedLayout title="Courier">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('couriers.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    New Courier
                </h2>

                
            </div>
        </template>

        <div class="p-6 mb-4 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <form
                @submit.prevent="form.post(route('couriers.store'))"
                class=""
            >

                <div class="px-2 max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Courier Information
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Input the courier fields needed.
                        </p>
                    </header>

                    <div class="my-4 space-y-4">
                        <div>
                            <Label for="image" value="Courier logo"/>

                            <Input
                                id="image"
                                type="file"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                @change="(e) => form.image = e.target.files[0]"
                                autocomplete="image"
                            />

                            <InputError class="mt-2" :message="form.errors.image" />
                        </div>

                        <div>
                            <Label for="name" value="Courier name"/>

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
                            <Label for="email" value="Email"/>

                            <Input
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autofocus
                                autocomplete="email"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <Label for="contact_no" value="Contact #"/>

                            <Input
                                id="contact_no"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.contact_no"
                                required
                                autofocus
                                autocomplete="contact_no"
                            />

                            <InputError class="mt-2" :message="form.errors.contact_no" />
                        </div>

                        <div>
                            <Label for="address" value="Address" />

                            <TextArea
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                required
                                autofocus
                                autocomplete="address"
                            >
                            </TextArea>

                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Create courier</Button>

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
