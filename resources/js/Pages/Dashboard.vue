<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div
                class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-4 grid-rows-2 gap-5 py-5"
            >
                <div
                    class="hover:cursor-pointer hover:bg-red-200 h-48 bg-red-500 col-span-2"
                >
                    1
                </div>
                <div
                    class="hover:cursor-pointer hover:bg-green-200 h-48 bg-green-400 col-span-1"
                >
                    2
                </div>
                <div
                    class="hover:cursor-pointer hover:bg-blue-200 h-48 bg-blue-300 col-span-1"
                >
                    3
                </div>

                <div
                    class="hover:cursor-pointer hover:bg-gray-200 h-48 bg-gray-400 col-span-1"
                >
                    4
                </div>
                <div
                    class="hover:cursor-pointer hover:bg-cyan-200 h-48 bg-cyan-400 col-span-3"
                >
                    5
                </div>
                <div
                    class="hover:cursor-pointer hover:bg-yellow-200 h-48 bg-yellow-500 col-span-3"
                >
                    6
                </div>
                <div
                    class="hover:cursor-pointer hover:bg-yellow-200 h-48 bg-yellow-500 col-span-1"
                >
                    7
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
