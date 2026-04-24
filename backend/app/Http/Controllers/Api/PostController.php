<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //return $this->postService->getAllPosts();
       $posts = $this->postService->getAllPosts();

       return PostResource::collection($posts);
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
     $data = $request->validated();
 
     if($request->hasFile('post_image')){
        $request = $request->file('post_image')->store('posts','public');
        $data['post_image'] = $request;
     }
     return $this->postService->createPost($data);   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->postService->findPost($id);

        return new PostResource($post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        $data = $request->validated();
        $post = $this->postService->findPost($id);
        if ($request->hasFile('post_image')){
            if($post->post_image && Storage::disk('public')->exists($post->post_image)){
                Storage::disk('public')->delete($post->post_image);
            }
            $path = $request->file('post_image')->store('posts','public');
            $data['post_image'] = $path;
        }
        $post = $this->postService->updatePost($id, $data);
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->postService->deletePost($id);

        return response()->json(['message' => 'Post deleted successfully']);
    }
}
