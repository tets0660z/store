<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CategoryItems from "./Category/CategoryItems.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps(["items"]);
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
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <Link href="product?category=mens-clothing"> Men's Clothing </Link>
            <span>|</span>
            <Link href="product?category=womens-clothing">
                Women's Clothing
            </Link>
            <span>|</span>
            <Link href="product?category=electronics"> Electronics </Link>
            <span>|</span>
            <Link href="product?category=jewelery"> Jewelries </Link>
        </div>
    </header>

    <div class="grid grid-cols-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            v-for="item in items"
            class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
        >
            <div class="shrink-0">
                <img class="h-16 w-16" :src="item.image" alt="ChitChat Logo" />
            </div>
            <div class="flex flex-col">
                <div class="text-xl font-medium text-black">
                    {{ item.title }}
                </div>
                <p class="text-slate-500 line-clamp-1">
                    {{ item.description }}
                </p>
                <div class="ml-auto mt-8 space-x-3">
                    <PrimaryButton>Buy Now</PrimaryButton>
                    <SecondaryButton class="">Add to Cart</SecondaryButton>
                </div>
            </div>
        </div>
    </div>
</template>
