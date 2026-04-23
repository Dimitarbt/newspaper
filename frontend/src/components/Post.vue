<script setup>

const props = defineProps({
    posts:Object
})
</script>

<template>
    <div>
     <article class="max-w-2xl mx-auto p-4 mt-10 bg-white rounded-2xl shadow-xl" v-for="post in posts" :key="post.id">
        <header class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ post.title }}</h1>
            <p class="text-gray-600">Published on {{ post.created_at }}</p>
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