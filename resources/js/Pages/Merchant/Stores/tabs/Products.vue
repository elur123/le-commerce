<script setup>
import { ref, computed, watch } from 'vue'
import { useForm } from '@inertiajs/vue3'

import Table from '@/Components/Table.vue'
import Modal from '@/Components/Modal.vue'

import AddProduct from '@/Pages/Merchant/Stores/tabs/partials/AddProduct.vue'
import EditProduct from '@/Pages/Merchant/Stores/tabs/partials/EditProduct.vue'

const props = defineProps({
    store: Object,
    products: Array,
    availableProducts: Array,
})

const showAddProduct = ref(false);
const isAdd = ref(true);

const columns = ['product name', 'price', 'quantity', 'availability', '']
const identifiers = [
    { key: 'name', type: 'label', url_key: ''},
    { key: 'price', type: 'label', url_key: ''},
    { key: 'quantity', type: 'label', url_key: ''},
    { key: 'availability', type: 'label', url_key: ''},
    { key: 'actions', type: 'actions', url_key: ''},
]

const form = useForm({
    product: '',
    name: '',
    quantity: 0,
    price: 0,
    is_available: true,
})

const availableProducts = computed(() => {

    return props.availableProducts.map(e => {
        return {
            id: e.id,
            label: e.name
        }
    })
})

watch(() => form.product, (product) => {

    let find = props.availableProducts.find(e => e.id == product.id)
    if (find) 
    {
        form.price = find.initial_price
    }
})

const showAddModal = () => {
    isAdd.value = true
    showAddProduct.value = !showAddProduct.value
    form.reset()
}

const showEditModal = (data) => {
    isAdd.value = false
    showAddProduct.value = !showAddProduct.value

    form.product = data.id
    form.name = data.name
    form.quantity = data.quantity
    form.price = data.price
    form.is_available = data.is_available
}

const addProduct = () => {
    form.post(route('store-product.store', props.store), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            showAddProduct.value = false
        }
    })
}

const updateProduct = () => {
    form.put(route('store-product.update', form.product), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            showAddProduct.value = false
        }
    })
}
</script>

<template>

    <div class="w-full shadow rounded-md">

        <div id="header" class="px-4 py-2 flex justify-between items-center">
            <h3 class="font-bold text-xl">Store Product</h3>
            <Button @click="showAddModal">Add Product</Button>
        </div>

        <div id="body" class="px-4 py-2">
            <Table 
                :identifiers="identifiers" 
                :columns="columns" 
                :rows="props.products" 
                :haveSearch="false" 
                :havePagination="false"
                @tableAction="showEditModal"
            />
        </div>

        <Modal
            :show="showAddProduct"
            @close="() => { showAddProduct = false }"
        >
           
            <AddProduct 
                v-if="isAdd"
                :form="form"
                :availableProducts="availableProducts"
                @changeProduct="changeProduct"
                @addProduct="addProduct"
            />
            <EditProduct 
                v-if="!isAdd"
                :form="form"
                :availableProducts="availableProducts"
                @updateProduct="updateProduct"
            />

        </Modal>
    </div>
    
</template>