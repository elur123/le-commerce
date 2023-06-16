<script setup>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from '@headlessui/vue'
import { ref } from 'vue'

const props = defineProps({
    tabs: {
        type: Array,
        default: []
    }
})

const selectedTab = ref(0);

const selectTab = (index) => {
    selectedTab.value = index;
};
</script>

<template>
     <TabGroup>
        <TabList class="flex border-b border-gray-100 dark:border-b-dark-eval-3">
            <Tab
                v-for="(tab, index) in tabs"
                :key="index"
                as="template"
                v-slot="{ selected }"
                >
                <button
                    :class="[
                    'px-6 py-4 text-sm leading-5 font-bold border-b-2',
                    'ring-white ring-opacity-60 ring-offset-0 ring-offset-orange-400 focus:outline-none focus:ring-0',
                    selected
                        ? ' text-orange-500 font-bold border-b-2 border-orange-500'
                        : ' border-transparent hover:text-orange-500 hover:border-b-2 hover:border-orange-500',
                    ]"
                    @click="selectTab(index)"
                >
                    {{ tab.label }}
                </button>
            </Tab>
        </TabList>

        <TabPanels class="mt-2">
            <TabPanel
                v-for="(tab, index) in tabs"
                :key="index"
                :class="[
                    'rounded-xl p-3',
                    'ring-white ring-opacity-60 ring-offset-0 ring-offset-blue-400 focus:outline-none focus:ring-0',
                ]"
                 v-show="selectedTab === index"
            >
                <slot :name="tab.slotName"></slot>
            </TabPanel>
        </TabPanels>
    </TabGroup>
</template>