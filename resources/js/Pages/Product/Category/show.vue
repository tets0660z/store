<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineOptions({ layout: AuthenticatedLayout });

defineProps(["categories"]);
</script>

<template>
    <Head title="Category" />
    <header class="bg-white shadow">
        <h2
            class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 font-semibold text-xl text-gray-800 leading-tight"
        >
            Category
        </h2>
    </header>
    <!-- Item Cards -->
</template>
