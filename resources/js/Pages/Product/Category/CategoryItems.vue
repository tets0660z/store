<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
defineProps(["items", "category"]);
</script>

<template>
    <div
        v-for="item in items"
        class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
    >
        <div class="shrink-0" v-if="item.category === `men's clothing`">
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
</template>
