<script setup>
import Modal from "@/Components/Modal.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";
import AddToCart from "./AddToCart.vue";

const displayingProduct = ref(false);

defineProps(["title", "description", "image"]);
const displayProduct = () => {
    displayingProduct.value = true;
};

const closeModal = () => {
    displayingProduct.value = false;
};
</script>

<template>
    <section class="space-y-2">
        <header>
            <h2
                class="text-lg font-medium text-gray-900 hover:cursor-pointer hover:text-sky-500"
                @click="displayProduct"
            >
                {{ title }}
            </h2>
        </header>
        <Modal :show="displayingProduct" @close="closeModal">
            <div
                @click="closeModal"
                class="text-xl pt-5 pr-5 flex font-black justify-end hover:cursor-pointer h-full"
            >
                X
            </div>
            <div
                class="p-6 mx-auto bg-white rounded-xl shadow-lg flex flex-col items-center space-x-4 space-y-3"
            >
                <div class="shrink-0">
                    <img class="w-80" :src="image" alt="Items" />
                </div>
                <div class="flex flex-col space-y-6">
                    <div class="text-xl font-medium text-black">
                        {{ title }}
                    </div>
                    <p class="text-slate-500">
                        {{ description }}
                    </p>
                    <div class="flex ml-auto mt-8 space-x-3">
                        <SuccessButton>Buy Nowasd</SuccessButton>

                        <AddToCart
                            :title="title"
                            :image="image"
                            :description="description"
                        />
                    </div>
                </div>
            </div>
        </Modal>
    </section>
</template>
