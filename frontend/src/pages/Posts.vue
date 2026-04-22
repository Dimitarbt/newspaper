<script setup>
import { onMounted, ref } from 'vue';
import axiosClient from '../axios';


const posts = ref([])
const loading = ref(false);

onMounted(() => {
    axiosClient.get('/posts')
    .then(response => {
        console.log(response.data)
    })
})

function getAllPosts(){
    alert('getAllPosts');
}


</script>

<template>
    <h1 class="text-red-500 text-3xl">Posts</h1>
    <div>
     <article class="max-w-2xl mx-auto p-4">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">How to Use Tailwind CSS</h1>
            <p class="text-gray-600">Published on May 20, 2026</p>
        </header>

        <div class="prose prose-blue max-w-none">
            <p>Tailwind CSS is a utility-first CSS framework...</p>
        </div>
     </article>
    </div>
</template>