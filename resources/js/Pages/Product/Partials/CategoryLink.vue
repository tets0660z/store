<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
const categories = ref([
    "Men's Clothing",
    "Women's Clothing",
    "Jewelery",
    "Electronics",
]);
</script>

<template>
    <div v-for="category in categories">
        <Link :href="route('category.show', category.toLowerCase())">{{
            category
        }}</Link>
    </div>
</template>
