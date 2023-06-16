<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { ArrowLeftIcon } from '@/Components/Icons/outline'
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { ref } from 'vue'


const category = usePage().props.category
const image = ref();


const form = useForm({
    _method: 'put',
    label: category.label,
    image: '',
})

const changeImage = (e) => {

    form.image = e.target.files[0]
}

const Update = () => {
    
    form.post(route('categories.update', category))
}
</script>

<template>
    <AuthenticatedLayout title="Categories">
        <template #header>
            <div class="flex flex-col gap-4 md:flex-row md:items-center">
                <Button
                    class="bg-transparent items-center gap-2 max-w-xs"
                    v-slot="{ iconSizeClasses }"
                    :href="route('categories.index')"
                >
                    <ArrowLeftIcon aria-hidden="true" :class="iconSizeClasses" />

                    <span>Back</span>
                </Button>
                <h2 class="text-xl font-semibold leading-tight">
                    Edit Category
                </h2>
            </div>
        </template>

        <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
            <section class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Category Information
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Input the category fields needed.
                    </p>
                </header>

                <form
                    @submit.prevent="Update"
                    class="mt-6 space-y-6"
                >
                    <div>
                        <Label for="label" value="Category label" />

                        <Input
                            id="label"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.label"
                            required
                            autofocus
                            autocomplete="label"
                        />

                        <InputError class="mt-2" :message="form.errors.label" />
                    </div>

                    <div>
                        <Label for="image" value="Image" />

                        <Input
                            id="image"
                            type="file"
                            class="mt-1 block w-full"
                            ref="image"
                            @change="changeImage"
                            autocomplete="image"
                        />

                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>


                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing">Save</Button>

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
