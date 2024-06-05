<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
const values = defineProps(["items", "category"]);

function formatCategory(value) {
    let category = "";
    if (value === "mens-clothing") category = `men's clothing`;
    else if (value === "womens-clothing") category = `women's clothing`;
    else category = value;

    return category;
}
const filteredItems = values.items.filter(
    (item) => item.category === formatCategory(values.category)
);
</script>

<template>
    <div
        v-for="item in filteredItems"
        class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
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
</template>
