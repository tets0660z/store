<script setup>
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DisplayProduct from "/DisplayProduct.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

defineProps(["items"]);
</script>

<template>
    <div
        class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
    >
        <div class="shrink-0">
            <img class="h-16 w-16" :src="items.image" alt="Items" />
        </div>
        <div class="flex flex-col">
            <div class="text-xl font-medium text-black">
                {{ items.title }}
            </div>
            <p class="text-slate-500 line-clamp-1">
                {{ items.description }}
            </p>
            <div class="flex flex-col mt-8">
                <div class="text-gray-500 font-bold items-center text-lg">
                    Cost: ${{ items.price }}
                </div>
                <div class="text-gray-400 font-bold items-center text-lg">
                    Available Unit:{{ items.rating.count }}
                </div>
            </div>

            <div class="flex gap-x-4 flex-grow-0 justify-end"></div>
        </div>
    </div>
</template>
