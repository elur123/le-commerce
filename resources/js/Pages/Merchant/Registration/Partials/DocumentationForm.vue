<script setup>
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import TextArea from '@/Components/TextArea.vue'
import { useForm, usePage, Link } from '@inertiajs/vue3'

const props = defineProps({
    documents: Array
})

const user = usePage().props.auth.user

const form = useForm({
    file: '',
    note: '',
})
</script>
<template>
     <form @submit.prevent="form.post(route('merchant-registration.store-documents', user.merchant))">
        
        <div v-if="!documents.length">
            <div class="mb-4">
                <h3 class="text-lg font-medium leading-none text-gray-900 dark:text-white">Documentation validation</h3>
                <p class="text-sm text-gray-500">Submit all the documents you have that will verified your business.</p>
            </div>
            <div class="grid gap-4 mb-4 grid-cols-1">
                <div>
                    <Label for="file" value="File" />

                    <Input
                        id="file"
                        type="file"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        @change="function(e) { form.file = e.target.files[0] }"
                        autocomplete="file"
                    />

                    <InputError class="mt-2" :message="form.errors.file"  />
                </div>
                <div>
                    <Label for="label" value="Note" />

                    <TextArea v-model="form.note" class="mt-1 block w-full" />

                    <InputError class="mt-2"  />
                </div>
            </div>
            <Button>Submit</Button>
        </div>
        <div v-else class="my-4 bg-orange-500 p-4 rounded-s-full">
            <h3 v-if="!user.merchant.is_validated" class="text-lg text-white font-bold uppercase">Wait for the admin to verify your documents!</h3>
            <div v-else>
                <h3 class="text-lg text-white font-bold uppercase">Congratulations your account has been approved!</h3>
                <Link :href="route('dashboard')" class="text-blue-900 underline">Dashboard Link</Link>
            </div>
        </div>
    </form>

</template>