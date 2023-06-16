<script setup>
import SearchInput from '@/Components/SearchInput.vue'
import Pagination from '@/Components/Pagination.vue'
import TableActions from '@/Components/TableActions.vue'

const emit = defineEmits(['tableAction'])

const props = defineProps({
    search: Object,
    placeHolder: {
        type: String,
        default: ''
    },
    identifiers: {
        type: Array,
    },
    columns: {
        type: Array,
        default: [],
    },
    rows: {
        type: Array,
        default: [],
    },
    pagination: {
        type: Array,
        default: []
    },
    haveSearch: {
        type: Boolean,
        default: false
    },
    havePagination: {
        type: Boolean,
        default: false
    },
})

const functionAction = (data) => {
    emit('tableAction', data)
}
</script>

<template>
    <div class="relative z-10 w-full h-full">

        <div v-if="haveSearch" class="w-full md:w-1/2 mb-4 p-2">
            <SearchInput 
                :search="search" 
                class="w-full md:w-1/2" 
                :placeholder="placeHolder"
            />
        </div>

        <div class="">

            <table class="w-full text-sm text-left">

                <thead class="text-xs text-gray-700 uppercase bg-orange-500">
                    <tr>
                        <th v-for="(column, index) in props.columns" :key="index" class="px-4 py-3 border text-white dark:text-gray-900 dark:border-gray-900">
                            {{ column }}
                        </th>
                    </tr>
                </thead>

                <tbody v-if="props.rows.length">
                    <tr v-for="(row, index) in props.rows" :key="index" :class="index % 2 === 0 ? 'bg-gray-100 hover:bg-gray-300 dark:bg-transparent dark:text-white' : 'hover:text-gray-500 hover:bg-gray-300 dark:text-white'">
                        <td v-for="(identifier, index) in props.identifiers" :key="index" class="px-4 py-3">
                            <img v-if="identifier.type === 'image'" :src="row[identifier.url_key]" :alt="row[identifier.key]" class="w-8 h-8">
                            <span v-if="identifier.type === 'label'">{{ row[identifier.key] }}</span>
                            <div v-if="identifier.type === 'actions'">
                                <TableActions 
                                    :actions="row[identifier.key]"
                                    @functionAction="functionAction(row)" 
                                />
                            </div>
                        </td>
                    </tr>
                </tbody>

                <tbody v-else>
                    <tr class="bg-gray-100 hover:bg-gray-300 dark:bg-transparent dark:text-white">
                        <td class="px-4 py-3 text-gray-500 text-center" :colspan="props.columns.length">No data found...</td>
                    </tr>
                </tbody>

            </table>
        </div>

        <div v-if="havePagination" class="relative z-0 my-4">
            <Pagination :pages="pagination"  />
        </div>
    </div>
</template> 