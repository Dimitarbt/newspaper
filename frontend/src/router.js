import { createWebHistory, createRouter } from 'vue-router'
import Posts from './pages/Posts.vue';
import FormPost from './pages/FormPost.vue';
import Login from './pages/Login.vue';
import Home from './pages/Home.vue';
import Register from './pages/Register.vue';
const routes = [
  {
    path: '/', name: 'home', component: Home
  },
  {
    path:'/posts', name:"posts", component:Posts,
  },
  {    
    path:'/create-post', name: "create-post", component:FormPost
  },
  {    
    path:'/edit-post/:id', name: "edit-post", component:FormPost, params:true
  },
  {
    path: '/login', name: 'login', component: Login
  },
  {
    path: '/register', name: 'register', component: Register
  }
];


export const router = createRouter({
  history: createWebHistory(),
  routes,
})

