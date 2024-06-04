<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import { Head } from "@inertiajs/vue3";

defineProps(["items"]);
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
            <div class="mt-5">
                <NavLink :class="text - blue - 500">Men's Clothing </NavLink
                ><span>|</span> <NavLink>Women's Clothing </NavLink
                ><span>|</span> <NavLink>Electronics </NavLink><span>|</span>
                <NavLink>Jewelries </NavLink>
            </div>
        </template>

        <div class="grid grid-cols-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                v-for="item in items"
                class="p-6 max-w-lg mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
            >
                <div class="shrink-0">
                    <img
                        class="h-16 w-16"
                        :src="item.image"
                        alt="ChitChat Logo"
                    />
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
    </AuthenticatedLayout>
</template>
