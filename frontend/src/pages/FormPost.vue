<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { createPost, getPost, updatePost } from '../services/postService';
import { router } from '../router';
import { useRoute } from 'vue-router';

const form = ref({
    title: '',
    body: '',
    post_image: null
})

const errorMsg = ref({});
const isEditMode = ref(false);
const route = useRoute()

onMounted(async () => {
    if(route.params.id){
        isEditMode.value = true;
        const response = await getPost(route.params.id);
        form.value.title = response.data .title;
        form.value.body = response.data.body;
        // console.log(response.data)
        // if(response.data.post_image){
        //     form.value.post_image = response.data.post_image;
        // }
    }
})


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
        if(isEditMode.value){
            formData.append('_method','PUT');
            const response = await updatePost(route.params.id, formData);
            console.log(response.data)

        }
        else{
            const response = await createPost(formData)
            console.log(response.data)

        }
        router.push({name:'posts'})
    } catch (error) {
        console.log(error)
        errorMsg.value = error.response.data.errors || 'An error occurred while creating the post.';
    }
} 
</script>


<template>
<div class="max-w-2xl mx-auto p-4 mt-10 bg-white rounded-2xl shadow-xl">
  <h2 class="text-2xl font-bold mb-6 text-gray-900">Create Post</h2>
  <form @submit.prevent="submitForm" class="space-y-6">
   <label for="title">Title</label>
   <input type="text" v-model="form.title" id="title" name="title" class="w-full p-2 border border-gray-300 rounded-md mb-4" />
    <div v-if="errorMsg.title" class="text-red-500 mb-2">
        {{ errorMsg.title[0] }}
    </div>
   <label for="body">Body</label>   
   <textarea id="body" v-model="form.body" name="body" class="w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
    <div v-if="errorMsg.body" class="text-red-500 mb-2">
        {{ errorMsg.body[0]}}
    </div>
   <label for="post_image">Image</label>
   <input type="file" id="post_image" @change="handleImage" name="post_image" class="w-full p-2 border border-gray-300 rounded-md mb-4" />
    <div v-if="errorMsg.post_image" class="text-red-500 mb-2">
        {{ errorMsg.post_image[0] }}
    </div>
    <button type="submit" :class="[isEditMode ? 'bg-green-500 hover:bg-green-600' : 'bg-blue-500 hover:bg-blue-600', 'px-4 py-2 text-white rounded-md']">{{ isEditMode ? 'Update' : 'Create'}} Post</button>
  </form>
</div>

</template>