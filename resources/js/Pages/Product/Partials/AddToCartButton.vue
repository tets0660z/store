<script setup>
import { router, usePage } from "@inertiajs/vue3";
import { reactive, ref } from "vue";

const product = defineProps(["item", "item_quantity"]);

// disabling button
const processing = ref(false);
// use to access $page
const page = usePage();

// const form = reactive({
//     price: product.item.price,
//     product_id: product.item.id,
//     quantity: product.item_quantity,
//     user_id: page.props.auth.user.id,
// });

function addToCart() {
    console.log(product.item_quantity);
    router.post(
        "/cart",
        {
            price: product.item.price,
            product_id: product.item.id,
            quantity: product.item_quantity,
            user_id: page.props.auth.user.id,
        },
        {
            onStart: () => {
                processing.value = true;
            },
            onFinish: () => {
                processing.value = false;
            },
            preserveScroll: true,
        }
    );
}
</script>

<template>
    <!-- <form @submit.prevent="addToCart"> -->
    <button
        @click="addToCart"
        :disabled="processing"
        href="#"
        title=""
        class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
        role="button"
        :class="processing ? 'bg-gray-500' : 'bg-blue-700'"
    >
        <svg
            class="w-5 h-5 -ms-2 me-2"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="none"
            viewBox="0 0 24 24"
        >
            <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
            />
        </svg>
        Add to cart
    </button>
    <!-- </form> -->
</template>
