<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DisplayProduct from "./DisplayProduct.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
const values = defineProps(["items", "category"]);

function hasCategory(category) {
    if (category === null) return values.items;
    else return filteredItems;
}

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
        v-for="item in hasCategory(values.category)"
        class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
    >
        <div class="shrink-0">
            <img class="h-16 w-16" :src="item.image" alt="Items" />
        </div>
        <div class="flex flex-col">
            <div class="text-xl font-medium text-black">
                <DisplayProduct
                    :title="item.title"
                    :image="item.image"
                    :description="item.description"
                    class="max-w-sm"
                ></DisplayProduct>
            </div>
            <p class="text-slate-500 line-clamp-1">
                {{ item.description }}
            </p>
            <div class="flex flex-col mt-8">
                <div class="text-gray-500 font-bold items-center text-lg">
                    Cost: ${{ item.price }}
                </div>
                <div class="text-gray-400 font-bold items-center text-lg">
                    Available Unit:{{ item.rating.count }}
                </div>
            </div>

            <div class="flex gap-x-4 flex-grow-0 justify-end">
                <SuccessButton>Buy Now</SuccessButton>
                <SecondaryButton class="">Add to Cart</SecondaryButton>
            </div>
        </div>
    </div>
</template>
