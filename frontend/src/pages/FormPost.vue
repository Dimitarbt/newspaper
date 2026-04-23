<script setup>
import axios from 'axios';
import { ref } from 'vue';
import axiosClient from '../axios';
import { createPost } from '../services/postService';
import { router } from '../router';

const form = ref({
    title: '',
    body: '',
    post_image: null
})

const message = ref('');

const handleImage = (e) =>{
    form.value.post_image = e.target.files[0];
}

async function submitForm(){
    const formData = new FormData();
    formData.append('title',form.value.title);
    formData.append('body',form.value.body);
    if(form.value.post_image){
        formData.append('post_image',form.value.post_image);
    }

    try {
        //const response = await axiosClient.post('/posts', formData) 
        const response = await createPost(formData)
        console.log(response.data)
        router.push({name:'posts'})
    } catch (error) {
        console.log(error)
        message.value = error.response.data.message || 'An error occurred while creating the post.';
    }
} 
</script>


<template>
<div class="max-w-2xl mx-auto p-4 mt-10 bg-white rounded-2xl shadow-xl">
  <h2 class="text-2xl font-bold mb-6 text-gray-900">Create Post</h2>
  <div v-if="message" class="text-red-500 mb-4">
    {{ message }}
  </div>
  <form @submit.prevent="submitForm" class="space-y-6">
   <label for="title">Title</label>
   <input type="text" v-model="form.title" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-md mb-4" />

   <label for="body">Body</label>   
   <textarea id="body" v-model="form.body" name="body" class="w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
   
   <label for="post_image">Image</label>
   <input type="file" id="post_image" @change="handleImage" name="post_image" class="w-full p-2 border border-gray-300 rounded-md mb-4" />
   
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
  </form>
</div>

</template>