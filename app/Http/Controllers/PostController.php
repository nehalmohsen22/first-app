<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use app\Http\Requests\StorePostRequest;
use Carbon\Carbon;

class PostController extends Controller
{

    
    public function index()
    {
        

       $posts=post::all();
       $postspag = post::paginate(15);
       return view('posts.index',['allPosts'=>$postspag]);

    }

    public function create()
    {
        $users = user::all();
        return view('posts.create',[
            'users'=>$users,
                ]);
    }

    public function store()
    {

         request()->validate([
             'title' => ['required' , 'unique:posts' , 'min:3'],
             'description'=>['required', 'min:10'],
           'post_creator'=> ['required','exists:users,id']
         ]);

        $data = request()->all();
        //dd($data);

        post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id'=>$data['post_creator'],
        
        ]);

        return to_route('posts.index');
    



    }

    public function show($post)
    {
        $dbpost= post::find($post);
      
        return view('posts.show',['post'=>$dbpost]);
      
    }

    public function edit($id){

        $postShow = Post::find($id);
        $users = User::all();
        return view('posts.edit', [
            "postShow" => $postShow,
            "users" => $users
        ]);
      
    }

       public function update($id){
        $updatedPost = Post::find($id);
        request()->validate([
            'title' => "required|unique:posts,title,{$updatedPost->id}|min:3",
            'description' => ['required', 'min:10'],
            'post_creator' => 'required|exists:users,id'
        ]);

       
      
        $data = request()->post();
        $updatedPost->title = $data['title'];
        $updatedPost->user_id = $data['post_creator'];
        $updatedPost->save();
        return to_route('posts.index');
    
    }


    public function destroy ($id){

        $user = Post::find($id);
        $user->delete();
        return to_route('posts.index'); 

  

       }
}