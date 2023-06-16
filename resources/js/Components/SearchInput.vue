<script setup>
import { useForm } from '@inertiajs/vue3'

let props = defineProps({
    search: {
        type: Object,
        required: true
    },
    placeholder: {
        type: String,
        default: 'Enter keyword'
    }
})

const form = useForm({
    s: props.search.keyword,
})

function search() {
    form.get(props.search.url, {
        preserveScroll: true,
        preserveState: true,
    })
}

</script>

<template>
    <form 
        @submit.prevent="search"
    >
        <div>
            <input
                :class="[
                    'w-full p-2 bg-transparent border-b-2 border-orange-300 ring-0 rounded-md',
                    'focus:ring-0 focus:outline-0 focus:border-b-2 focus:border-orange-500'
                ]"
                :placeholder="placeholder"
                v-model="form.s"
            />
        </div>
    </form>
    
</template>
