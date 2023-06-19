<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    logistics: {
        type: Array,
        default: []
    }
});
</script>

<template>
    <footer class="w-full pt-4 px-2 md:px-24 bg-gray-200">
        <div id="head-footer" class="py-4 border-b border-gray-300">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <h4 class="uppercase mb-2 font-bold text-sm">Customer Service</h4>
                    <ul class="space-y-2">
                        <li class="text-xs">Help Centre</li>
                        <li class="text-xs">Payment Methods</li>
                        <li class="text-xs">Order Tracking</li>
                        <li class="text-xs">Free Shipping</li>
                        <li class="text-xs">Return & Refund</li>
                        <li class="text-xs">Contact Us</li>
                        <li class="text-xs">
                            <Link :href="route('register')">Register as merchant</Link>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="uppercase mb-2 font-bold text-sm">About LE-Commerce</h4>
                    <ul class="space-y-2">
                        <li class="text-xs">About Us</li>
                        <li class="text-xs">Privacy and Plicy</li>
                        <li class="text-xs">Seller Centre</li>
                        <li class="text-xs">Flash Deals</li>
                        <li class="text-xs">Media Contact</li>
                    </ul>
                </div>
                <div>
                    <h4 class="uppercase mb-2 font-bold text-sm">Logistics</h4>
                    <ul class="space-y-2">
                        <li v-for="courier in logistics" :key="courier.id" class="text-xs">{{ courier.name }}</li>
                    </ul>
                </div>
                <div>
                    <h4 class="uppercase mb-2 font-bold text-sm">Follow Us</h4>
                    <ul class="space-y-2">
                        <li class="text-xs">Facebook</li>
                        <li class="text-xs">Twitter</li>
                        <li class="text-xs">Instagram</li>
                        <li class="text-xs">LinkedIn</li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="bottom-footer" class="py-4 w-full text-center">
            <p class="text-sm">© 2023 LE-Commerce. All Rights Reserved.</p>
        </div>
    </footer>
</template>