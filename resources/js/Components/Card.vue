<script setup>
defineProps({
    title: {
        type: String,
    },
});
</script>
<template>
    <div
        class="block min-w-sm p-6 my-6 bg-white border border-green-400 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700"
    >
        <h5
            class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
        >
            {{ title }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            Here are the biggest enterprise technology acquisitions of 2021 so
            far, in reverse chronological order.
        </p>
    </div>
</template>
