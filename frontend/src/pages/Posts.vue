<script setup>
import { onMounted, ref } from 'vue';
// import axiosClient from '../axios';
import { getPosts } from '../services/postService';
import Post from '../components/Post.vue';

const posts = ref([])
const loading = ref(false);

onMounted(async () => {
    // axiosClient.get('/posts')
    // .then(response => {
    //     console.log(response.data)
    // })

    const response = await getPosts();
    posts.value = response.data
    

})

// function getAllPosts(){
//     //alert('getAllPosts');
// }


</script>

<template>
    <h1 class="text-red-500 text-3xl">Posts</h1>
    <Post :posts="posts" />
</template>