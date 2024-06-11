<script setup>
import Modal from "@/Components/Modal.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

import Card from "@/Components/Card.vue";
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import SuccessButton from "@/Components/SuccessButton.vue";
import AddToCartButton from "./AddToCartButton.vue";

const displayingProduct = ref(false);
const displayingCard = ref(false);
const addToCart = ref("");
const quantity = 1;

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

        <div class="flex flex-col w-3/4">
            <div class="text-xl font-medium text-black">
                <Link
                    :href="route('product.show', item.id)"
                    class="hover:text-blue-400"
                >
                    {{ item.title }}
                </Link>
            </div>
            <p class="text-slate-500">
                {{ item.description }}
            </p>
            <div class="flex flex-col mt-8">
                <div class="text-gray-500 font-bold items-center text-lg">
                    Cost: ${{ item.price }}
                </div>
                <div
                    class="text-gray-400 font-bold items-center text-lg flex justify-between"
                >
                    <div>Available Unit:{{ item.count }}</div>
                    <div class="flex-grow-0 flex gap-4">
                        <SuccessButton>Buy Now</SuccessButton>
                        <AddToCartButton
                            :item="item"
                            :item_quantity="quantity"
                        ></AddToCartButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Card v-show="displayingCard" :title="addToCart" />
</template>
