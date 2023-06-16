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


const props = defineProps({})

const form = useForm({
    name: '',
    address: '',
    mobile_no: '',
})

</script>

<template>
    <AuthenticatedLayout title="Product">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('stores.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    New Store
                </h2>

                
            </div>
        </template>

        <div class="p-6 mb-4 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <form
                @submit.prevent="form.post(route('stores.store'))"
                class=""
            >
                <div class="max-w-xl px-4 mb-4">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Store Information
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Input the product fields needed.
                        </p>
                    </header>

                    <div class="mt-4 space-y-4">
                        <div>
                            <Label for="name" value="Store name"/>

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
                            <Label for="address" value="Store address" />

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

                        

                        <div>
                            <Label for="mobile_no" value="Mobile #"/>

                            <Input
                                id="mobile_no"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.mobile_no"
                                required
                                autofocus
                                autocomplete="mobile_no"
                            />

                            <InputError class="mt-2" :message="form.errors.mobile_no" />
                        </div>
                    </div>
                </div>
                <div class="px-4 border-top">
                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Create store</Button>

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
