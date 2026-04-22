import { createWebHistory, createRouter } from 'vue-router'
import Posts from './pages/Posts.vue';
const routes = [
  {
    path:'posts', name:"posts", component:Posts
  }
];


export const router = createRouter({
  history: createWebHistory(),
  routes,
})

