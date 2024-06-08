<script setup>
import Modal from "@/Components/Modal.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";
import AddToCart from "./AddToCart.vue";
import { Head } from "@inertiajs/vue3";

const displayingProduct = ref(false);
const xxl = "6xl";
defineProps(["item"]);
const displayProduct = () => {
    displayingProduct.value = true;
};

const closeModal = () => {
    displayingProduct.value = false;
};
</script>
<template>
    <Head title="Product" />
    <Modal :show="displayingProduct" @close="closeModal" class="flex">
        <div
            @click="closeModal"
            class="text-xl pt-5 pr-5 flex font-black justify-end hover:cursor-pointer h-full"
        >
            X
        </div>
        <img class="m-10 mx-auto w-3/4" :src="item.image" alt="Items" />
    </Modal>
    <div
        class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
    >
        <div class="shrink-0">
            <img
                class="h-48 w-48 hover:cursor-pointer"
                :src="item.image"
                alt="Items"
                @click="displayProduct"
            />
        </div>
        <div class="flex flex-col">
            <div class="text-xl font-medium text-black">
                {{ item.title }}
            </div>
            <p class="text-slate-500">
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

            <div class="flex gap-x-4 flex-grow-0 justify-end"></div>
        </div>
    </div>
</template>
