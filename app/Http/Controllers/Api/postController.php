<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    { 

       $posts = post::all();
       return PostResource::collection($posts);
    }

    public function show($postId)
    {
       $post = post::find($postId);
       return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
      
        request()->validate([
            'title' => ['required' , 'unique:posts' , 'min:3'],
            'description'=>['required', 'min:10'],
          'post_creator'=> ['required','exists:users,id']
        ]);

        $data = request()->all();

         $req = request()->hasFile('image');
       if($req){
           $destination_path = 'public/images/posts';
           $image = request()->file('image');
           $image_name = $image->getClientOriginalName();
           $path = request()->file('image')->storeAs($destination_path,$image_name);
           $data['image'] = $image_name;
       }
      
   
      $post =  post::create([
           'title' => $data['title'],
           'description' => $data['description'],
           'user_id'=>$data['post_creator'],
            //'image'=>$data['image'],
       
       ]); 
      

       return new PostResource($post);
    }
}
