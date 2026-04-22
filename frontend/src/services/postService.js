import axiosClient from "../axios";

export const getPosts = () => axiosClient.get('/posts');