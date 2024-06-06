<script setup>
import Modal from "@/Components/Modal.vue";
import SuccessButton from "@/Components/SuccessButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import { ref } from "vue";

const confirmingUserDeletion = ref(false);

defineProps(["title", "description", "image"]);
const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
};
</script>

<template>
    <section class="space-y-2">
        <header>
            <h2
                class="text-lg font-medium text-gray-900 hover:cursor-pointer hover:text-sky-500"
                @click="confirmUserDeletion"
            >
                {{ title }}
            </h2>
        </header>

        <!-- <DangerButton @click="confirmUserDeletion">Delete Account</DangerButton> -->

        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div
                @click="closeModal"
                class="text-xl p-5 bg-slate-100 flex font-black justify-end hover:cursor-pointer"
            >
                X
            </div>
            <div
                class="p-6 mx-auto bg-white rounded-xl shadow-lg flex items-center space-x-4 space-y-3 mt-5"
            >
                <div class="shrink-0">
                    <img class="h-48 w-48" :src="image" alt="Items" />
                </div>
                <div class="flex flex-col space-y-6">
                    <div class="text-xl font-medium text-black">
                        {{ title }}
                    </div>
                    <p class="text-slate-500">
                        {{ description }}
                    </p>
                    <div class="ml-auto mt-8 space-x-3">
                        <SuccessButton>Buy Now</SuccessButton>
                        <SecondaryButton>Add to Cart</SecondaryButton>
                    </div>
                </div>
            </div>
        </Modal>
    </section>
</template>
