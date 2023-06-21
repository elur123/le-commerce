<script setup>
import { TrashIcon, PlusIcon, MinusIcon } from '@heroicons/vue/outline'

import Button from '@/Components/Button.vue'
import Checkbox from '@/Components/Checkbox.vue'
import Input from '@/Components/Input.vue'

const emit = defineEmits(['removeFromCart'])

defineProps({
    details: Object,
    isLast: Boolean
})

function removeFromCart() {

    emit('removeFromCart')
}
</script>
<template>
    <div class="flex items-center text-sm py-4" :class="!isLast ? 'border-b' : ''">
        <div class="w-2/6 flex items-center">
            <Checkbox class="mr-2" />
            <img class="w-20 h-20 mr-2" :src="details.details.product.image_url" :alt="details.details.product.name">
            <p class="">{{ details.details.product.name }}</p>
        </div>
        <div class="w-1/6">
            {{ details.price }}
        </div>
        <div class="w-1/6">
            <div class="w-1/2 flex justify-between items-center border">
                <Button 
                    iconOnly
                    variant="none" 
                    class="text-sm rounded-none border-r"
                >
                    <MinusIcon
                        class="mx-auto w-4 h-full"
                        aria-hidden="true"
                    />
                </Button>
                <Input class="w-full text-center focus:border-0 focus:ring-0 focus:ring-offset-0" v-model="details.quantity" />
                <Button 
                    iconOnly
                    variant="none" 
                    class="text-sm rounded-none border-l"
                >
                    <PlusIcon
                        class="mx-auto w-4 h-full"
                        aria-hidden="true"
                    />
                </Button>
            </div>
              
        </div>
        <div class="w-1/6">
            <span class="text-orange-500 font-bold">{{ details.sub_total }}</span>
        </div>
        <div class="w-1/6 text-center">
             <Button 
                iconOnly
                variant="none" 
                class="text-sm rounded-none"
                @click="removeFromCart"
            >
                <TrashIcon
                    class="mx-auto w-6 h-6 text-orange-500 cursor-pointer"
                    aria-hidden="true"
                />
            </Button>
            
        </div>
    </div>
</template>