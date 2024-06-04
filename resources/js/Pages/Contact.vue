<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';


const message = ref('Hello World!');
// reactive state
const count = ref(0)
// functions that mutate state and trigger updates
function increment() {
  count.value++
}

// lifecycle hooks
onMounted(() => {
  console.log(`The initial count is ${count.value}.`)
})
</script>

<template>
    <Head title="Contact" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Contact</h2>
        </template>
    

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <button class="border border-red-600" @click="increment">Count is: {{ count }}</button> 
                    <div  id="test">

                        <p>{{ message }}</p>                   
                    </div>
                </div>
            </div>  
        </div>
        
    </AuthenticatedLayout>
</template>
