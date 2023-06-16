<script setup>
import Table from '@/Components/Table.vue'

const props = defineProps({
    documents: {
        type: Array,
        default: []
    }
})

const identifiers = [
    { key: 'document', type: 'label', url_key: ''},
    { key: 'note', type: 'label', url_key: ''},
    { key: 'status', type: 'label', url_key: ''},
    { key: 'actions', type: 'actions', url_key: ''}
    
]

const columns = ['File', 'Note', 'Status', '']
</script>

<template>
    <Table 
        :identifiers="identifiers"
        :columns="columns"
        :rows="documents"
    />
</template>