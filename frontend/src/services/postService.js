import axiosClient from "../axios";

export const getPosts = () => axiosClient.get('/posts');

// export const createPost = (postData) => {
export const createPost = (formData) => axiosClient.post('/posts', formData) 

// }