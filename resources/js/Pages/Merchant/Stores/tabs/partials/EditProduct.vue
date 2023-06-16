<script setup>
import InputError from '@/Components/InputError.vue'
import Label from '@/Components/Label.vue'
import Input from '@/Components/Input.vue'
import Select from '@/Components/Select.vue'
import Button from '@/Components/Button.vue'
import Checkbox from '@/Components/Checkbox.vue'
import Table from '@/Components/Table.vue'

const emit = defineEmits(['updateProduct'])

const props = defineProps({
    form: Object,
    availableProducts: Array
})

</script>
<template>
    <form @submit.prevent="() => emit('updateProduct')">
        <div id="head" class="px-4 py-2 border-b">
            <h3 class="font-bold text-xl dark:text-white">Edit product</h3>
        </div>

        <div id="body" class="px-4 py-2 space-y-4">
            <div>
                <Label for="product" value="Product" />

                <Input
                    id="product"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    disabled
                />
            </div>

            <div>
                <Label for="quantity" value="Quantity" />

                <Input
                    id="quantity"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.quantity"
                    required
                    autofocus
                    autocomplete="quantity"
                />

                <InputError class="mt-2" :message="form.errors.quantity" />
            </div>

            <div>
                <Label for="price" value="Price" />

                <Input
                    id="price"
                    type="number"
                    class="mt-1 block w-full"
                    v-model="form.price"
                    required
                    autofocus
                    autocomplete="price"
                />

                <InputError class="mt-2" :message="form.errors.price" />
            </div>

            <div class="flex items-center gap-4">

                <Checkbox 
                    type="checkbox"
                    class="block" 
                    v-model="form.is_available" 
                    :checked="form.is_available"
                />
                <label class="m-0 text-sm font-medium text-gray-700 dark:text-white">Available</label>
            </div>
        </div>

        <div id="footer" class="px-4 py-2 border-t">
            <Button class="">Update</Button>
        </div>
    </form>
</template>