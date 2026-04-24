import axios from "axios";
import axiosClient from "../axios";

export const getPosts = () => axiosClient.get('/posts');

// export const createPost = (postData) => {
export const createPost = (formData) => axiosClient.post('/posts', formData) 

export const getPost = (id) => axiosClient.get(`/posts/${id}`)

export const updatePost = (id, formData) => axiosClient.post(`/posts/${id}`,formData)

export const deletePost = (id) => axiosClient.delete(`/posts/${id}`)

// }