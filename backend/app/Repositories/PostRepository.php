<?php 

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostRepository{
   

    public function all(){
        return Post::latest()->get();
    }

    public function create(array $data){
        return Post::create($data);
    }

    public function delete($id){
        $post = Post::findOrFail($id);
    
        if($post->post_image && Storage::disk('public')->exists($post->post_image)){
            Storage::disk('public')->delete($post->post_image);
        }

        $post->delete();

        return true;

    }
}