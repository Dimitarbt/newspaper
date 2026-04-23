<script setup>
import { onMounted, ref } from 'vue';
import axiosClient from '../axios';
import { getPosts } from '../services/postService';
import Post from '../components/Post.vue';

const posts = ref([])
const loading = ref(false);

onMounted(() => {
  getAllPosts();
})

async function getAllPosts(){
    // axiosClient.get('/posts')
    // .then(response => {
    //     console.log(response.data)
    //     posts.value = response.data
    // })
    try {
    const response = await getPosts();
    posts.value = response.data
    } catch(erorr) {
       console.log(error)
    }

  
}


</script>

<template>
    <h1 class="text-red-500 text-3xl">Posts</h1>
    <Post :posts="posts" />
</template>