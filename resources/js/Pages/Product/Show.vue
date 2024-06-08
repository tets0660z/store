<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps(["item"]);

// use as persistent layout
defineOptions({ layout: AuthenticatedLayout });
</script>

<template>
    <div
        class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
    >
        <div class="shrink-0">
            <img class="h-16 w-16" :src="item.image" alt="Items" />
        </div>
        <div class="flex flex-col">
            <div class="text-xl font-medium text-black">
                {{ $page.props.item.title }}
            </div>
            <p class="text-slate-500 line-clamp-1">
                {{ item.description }}
            </p>
            <div class="flex flex-col mt-8">
                <div class="text-gray-500 font-bold items-center text-lg">
                    Cost: <span class="text-red-500"> ${{ item.price }}</span>
                </div>
                <div class="text-gray-400 font-bold items-center text-lg">
                    Available Unit:{{ item.rating.count }}
                </div>
            </div>

            <div class="flex gap-x-4 flex-grow-0 justify-end"></div>
        </div>
    </div>
</template>
