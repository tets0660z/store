<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ProductList from "./Partials/ProductList.vue";
import { Head, router, Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import { throttle, debounce } from "lodash";
import NavLink from "@/Components/NavLink.vue";

const product = defineProps({ items: Object, filters: Object });
let search = ref(product.filters.search);

watch(
    search,
    debounce(function (value) {
        router.get(
            "/product",
            { search: value },
            { preserveState: true },
            { replace: true }
        );
    }, 500)
);

//filter duplication
const categories = [
    `Men's Clothing`,
    `Women's Clothing`,
    "Kitchen",
    "Garments",
    "Food",
    "Electronics",
];
// product.items.data.map((result) =>
//     categories.push(
//         result.category.slice(0, 1).toUpperCase() +
//             result.category.slice(1, result.length)
//     )
// );
// const filteredCategories = [...new Set(categories)];
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
            <div class="" v-for="category in categories">
                <NavLink
                    :href="route('category.index', `${category}`)"
                    :active="route().current('category.index', `${category}`)"
                >
                    {{ category }}</NavLink
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
        <Link
            :href="link.url"
            v-if="link.url"
            v-html="link.label"
            class="border border-gray-500 p-1"
        >
        </Link>
        <span v-else="link.label"></span>
    </div>
</template>
