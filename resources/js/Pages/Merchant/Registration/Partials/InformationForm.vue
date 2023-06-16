<script setup>
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import TextArea from '@/Components/TextArea.vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    logo: '',
    company_name: '',
    address: '',
    mobile_number: ''
})
</script>
<template>
     <form @submit.prevent="form.post(route('merchant-registration.store'))">
        <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Merchant details</h3>
        <div class="grid gap-4 mb-4 grid-cols-1">
            <div>
                <Label for="logo" value="Company logo" />

                <Input
                    id="logo"
                    type="file"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    @change="function(e) { form.logo = e.target.files[0] }"
                    autocomplete="logo"
                />

                <InputError class="mt-2" :message="form.errors.logo"  />
            </div>
            <div>
                <Label for="company_name" value="Company name" />

                <Input
                    id="company_name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    v-model="form.company_name"
                    autocomplete="company_name"
                />

                <InputError class="mt-2" :message="form.errors.company_name"  />
            </div>
            <div>
                <Label for="label" value="Address" />

                <TextArea v-model="form.address" class="mt-1 block w-full" />

                <InputError class="mt-2" :message="form.errors.address"  />
            </div>
            <div>
                <Label for="mobile_number" value="Mobile #" />

                <Input
                    id="mobile_number"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    v-model="form.mobile_number"
                    autocomplete="mobile_number"
                />

                <InputError class="mt-2" :message="form.errors.mobile_number"  />
            </div>
        </div>
        <Button>Next step: Document validation</Button>
    </form>

</template>