<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductLists from "./Partials/ProductLists.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

import NavLink from "@/Components/NavLink.vue";

const values = defineProps(["items"]);
const search = ref("");

// use as persistent layout
defineOptions({ layout: AuthenticatedLayout });
</script>

<template>
    <Head title="Products" />
    <header class="bg-white shadow">
        <div
            class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center"
        >
            <!-- Categories -->
            <div>
                <NavLink
                    :href="route('category.index', `men's clothing`)"
                    :active="
                        route().current('category.index', `men's clothing`)
                    "
                >
                    Men's Clothing</NavLink
                >

                <span>|</span>
                <NavLink
                    :href="route('category.index', `women's clothing`)"
                    :active="
                        route().current('category.index', `women's clothing`)
                    "
                >
                    Women's Clothing</NavLink
                >

                <span>|</span>
                <NavLink
                    :active="route().current('category.index', `jewelery`)"
                    :href="route('category.index', `jewelery`)"
                >
                    Jewelries</NavLink
                >

                <span>|</span>
                <NavLink
                    :active="route().current('category.index', `electronics`)"
                    :href="route('category.index', `electronics`)"
                >
                    Electronics</NavLink
                >
            </div>
            <input
                class="right-screen relative rounded-lg"
                type="text"
                placeholder="search items..."
                v-model.lazy="search"
            />
        </div>
    </header>
    <!-- Item Cards -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-3" v-for="item in items">
        <ProductLists :item="item" :category="category"></ProductLists>
    </div>
</template>
