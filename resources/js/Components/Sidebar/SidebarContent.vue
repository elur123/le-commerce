<script setup>
import PerfectScrollbar from '@/Components/PerfectScrollbar.vue'
import SidebarLink from '@/Components/Sidebar/SidebarLink.vue'
import { DashboardIcon, ClipboardDocumentIcon, CubeIcon, BuildingStoreFronIcon } from '@/Components/Icons/outline'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import { TemplateIcon, TruckIcon, CogIcon } from '@heroicons/vue/outline'
</script>

<template>
    <PerfectScrollbar
        tagname="nav"
        aria-label="main"
        class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
    >
        <SidebarLink
            title="Dashboard"
            :href="route('dashboard')"
            :active="route().current('dashboard')"
        >
            <template #icon>
                <DashboardIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <hr>

        <SidebarCollapsible
            v-if="$page.props.auth.isAdmin"
            title="Merchants"
            :active="route().current('merchants.*')"
        >
            <template #icon>
                <TemplateIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('merchants.new')"
                title="Unverified Merchants"
                :active="route().current('merchants.new')"
            />
            <SidebarCollapsibleItem
                :href="route('merchants.index')"
                title="Verified Merchants"
                :active="route().current('merchants.index')"
            />
        </SidebarCollapsible>

        <SidebarLink
            title="Products"
            :href="route('products.index')"
            :active="route().current('products.*')"
        >
            <template #icon>
                <CubeIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarCollapsible
            title="Stores"
            :active="route().current('stores.*')"
        >
            <template #icon>
                <BuildingStoreFronIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('stores.index')"
                title="Store List"
                :active="route().current('stores.index')"
            />
            <SidebarCollapsibleItem
                :href="route('merchants.index')"
                title="Store product"
                :active="route().current('merchants.index')"
            />
        </SidebarCollapsible>

        <hr>

        <SidebarLink
            v-if="$page.props.auth.isAdmin"
            title="Categories"
            :href="route('categories.index')"
            :active="route().current('categories.*')"
        >
            <template #icon>
                <ClipboardDocumentIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarLink
            v-if="$page.props.auth.isAdmin"
            title="Couriers"
            :href="route('couriers.index')"
            :active="route().current('couriers.*')"
        >
            <template #icon>
                <TruckIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>
        </SidebarLink>

        <SidebarCollapsible
            v-if="$page.props.auth.isAdmin"
            title="Settings"
            :active="route().current('settings.*')"
        >
            <template #icon>
                <CogIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem
                :href="route('settings.banners.index')"
                title="Banners"
                :active="route().current('settings.banners.*')"
            />
        </SidebarCollapsible>

    </PerfectScrollbar>
</template>
