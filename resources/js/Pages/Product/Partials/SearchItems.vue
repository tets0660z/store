<script setup>
import { router, usePage } from "@inertiajs/vue3";
import { reactive, ref } from "vue";
import Swal from "sweetalert2";

const product = defineProps(["item", "item_quantity"]);

router.post();
</script>

<template>
    <input
        class="right-screen relative rounded-lg"
        type="text"
        placeholder="search items..."
        v-model.lazy="search"
    />
</template>
