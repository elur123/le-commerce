<script setup>
import { Menu, MenuButton, MenuItems, MenuItem } from '@headlessui/vue'
import { Link, router } from '@inertiajs/vue3'
import Button from '@/Components/Button.vue'
import {  VerticalElpsisIcon } from '@/Components/Icons/outline'

const emit = defineEmits(['functionAction'])

defineProps({
    actions: {
      type: Array,
      default: []
    },
})

const actionPut = (url) => {
  router.put(url)
}

function actionFunction() {

  emit('functionAction')
}
</script>


<template>
  <div class="w-56">
    <Menu as="div" class="w-full relative inline-block">
      <div>
        <MenuButton
          class="z-0 inline-flex w-full justify-center rounded-md bg-transparent  px-4 py-2 text-sm font-medium focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
        >
          Actions
          <VerticalElpsisIcon
            class="ml-2 -mr-1 h-5 w-5"
            aria-hidden="true"
          />
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 z-30 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
          <div class="px-1 py-1">
            <div
              v-for="(link, index) in actions" 
              :key="index"
            >
              <MenuItem
                v-slot="{ active }"
              >
                <Link
                  v-if="link.type == 'get' "
                  :href="link.href"
                  :class="[
                    active ? 'bg-orange-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center rounded-md px-4 py-2 text-sm',
                  ]"
                >
                  {{ link.label }}
                </Link>

                <Button
                  v-else-if="link.type == 'function' "
                  variant="none"
                  :class="[
                    active ? 'bg-orange-500 text-white' : 'text-gray-900',
                    'group flex w-full items-center rounded-md px-4 py-2 text-sm',
                  ]"
                  @click="actionFunction"
                >
                  {{ link.label }}
                </Button>

                

                <form 
                  v-else-if="link.type == 'put'"
                  @submit.prevent="actionPut(link.href)"
                >
                    <Button
                      variant="none"
                      :class="[
                        active ? 'bg-orange-500 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                    >
                      {{ link.label }}
                    </Button>
                </form>
              </MenuItem>

            </div>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </div>
</template>