<script setup>
import axiosClient from '../axios';
import { router } from '../router';

import { deletePost } from '../services/postService';
const props = defineProps({
    posts:Object
})

const emit = defineEmits(['delete-post'])

async function handlePostDelete(id){
    if(!confirm('Are you sure you want to delete this post?')){
        return;
    }
    try{
        await deletePost(id);
        emit('delete-post');
    }
    catch(error){
        console.log(error);
    }
}
</script>
<template>
    <div>
     <article class="max-w-2xl mx-auto p-4 mt-10 bg-white rounded-2xl shadow-xl" v-for="post in posts" :key="post.id">
        <header class="mb-8 flex items-center justify-between">
           <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ post.title }}</h1>
                <p class="text-gray-600">Published on {{ post.created_at }}</p>
           </div>
           <div>
             <button @click="handlePostDelete(post.id)" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 m-3">Delete</button>
             <button @click="router.push({name:'edit-post',params:{id:post.id}})" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Edit</button>
           </div>
            
        </header>
        <div v-if="post.post_image" class="mb-6">
            <img :src="post.post_image" class="rounded-lg w-48 h-36"  />
        </div>
        <div class="prose prose-blue max-w-none">
            <p>{{ post.body }}</p>
        </div>
     </article>
    </div>
</template>