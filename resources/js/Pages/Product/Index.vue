<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CategoryItems from "./Partials/CategoryItems.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps(["items"]);
const search = ref("");

//get uri query
const urlParams = new URLSearchParams(window.location.search);
const category = urlParams.get("category");

// use as persistent layout
defineOptions({ layout: AuthenticatedLayout });
</script>

<template>
    <Head title="Products" />
    <header class="bg-white shadow">
        <h2
            class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold text-xl text-gray-800 leading-tight"
        >
            Products
        </h2>
        <div
            class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center"
        >
            <!-- Categories -->
            <div>
                <Link href="product"> All Products </Link>
                <span>|</span>
                <Link href="product?category=mens-clothing">
                    Men's Clothing
                </Link>
                <span>|</span>
                <Link href="product?category=womens-clothing">
                    Women's Clothing
                </Link>
                <span>|</span>
                <Link href="product?category=electronics"> Electronics </Link>
                <span>|</span>
                <Link href="product?category=jewelery"> Jewelries </Link>
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
    <div class="grid grid-cols-2 max-w-7xl mx-auto sm:px-6 lg:px-8 gap-3">
        <CategoryItems :items="items" :category="category"></CategoryItems>
    </div>
</template>
