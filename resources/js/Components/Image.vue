<template>
    <img :src="'/images/' + images.src" alt="image.alt" />
</template>

<script setup>
const images = defineProps(["src", "alt"]);
</script>
