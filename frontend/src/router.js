import { createWebHistory, createRouter } from 'vue-router'
import Posts from './pages/Posts.vue';
import FormPost from './pages/FormPost.vue';
const routes = [
  {
    path:'/posts', name:"posts", component:Posts,
  },
  {    
    path:'/create-post', name: "create-post", component:FormPost
  }
];


export const router = createRouter({
  history: createWebHistory(),
  routes,
})

