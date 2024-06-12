<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductList from "./Partials/ProductList.vue";
import { Head, router } from "@inertiajs/vue3";
import { ref, watch } from "vue";

import NavLink from "@/Components/NavLink.vue";

defineProps({ items: Object });
let search = ref("");
watch(search, (value) => {
    router.get("/product", { search: value }, { preserveState: true });
});

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
            <div class="">
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
                v-model="search"
            />
        </div>
    </header>
    <!-- Item Cards -->
    <div
        class="max-w-7xl mx-auto sm:px-6 lg:px-8 gap-3"
        v-for="item in items.data"
    >
        <ProductList :item="item"></ProductList>
    </div>
    <div v-for="link in items.links" class="inline-flex">
        <a
            :href="link.url"
            v-if="link.url"
            v-html="link.label"
            class="border border-gray-500 p-1"
        >
        </a>
        <span v-else="link.label"></span>
    </div>
</template>
