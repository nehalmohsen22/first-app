<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    { 

        $posts=post::all();
        
       // post::othermethodes();
        //dd($posts);
    $postss = post::paginate(15);

   // {{ $users->links() }}

       return view('posts.index',['allPosts'=>$postss]);


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

        $data = request()->all();
        //dd($data);

        post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id'=>$data['post_creator'],
            //'created_at' => $data['created_at'],
        ]);

        return to_route('posts.index');
    //     $postData=request()->all();

    //     $post=[
    //         "id"=>count($this->posts )+1,
    //         "title" => request()["title"],
    //         "posted_by" => request()['postedby'],
    //         "created_at" => request()['createdat']
    //     ];


    //    array_push($this->posts,$post);


    //      return view('posts.index',['allPosts' => $this->posts]);



    }

    public function show($post)
    {
        $dbpost= post::find($post);
        //dd($dbpost);
        return view('posts.show',['post'=>$dbpost]);
        // foreach($this->posts as $p){
        //     if($p['id']==$post){
        //         return view('posts.show',['post'=>$p]);
        //     }
        // }
        // return abort(404);
    }

    public function edit($id){

        $postShow = Post::find($id);
        $users = User::all();
        return view('posts.edit', [
            "postShow" => $postShow,
            "users" => $users
        ]);
        // foreach($this->posts as $p){
        //     if($p['id']==$id){
        //         return view('posts.edit',['post'=>$p]);
        //     }
        // }
        // return abort(404);
    }

       public function update($id){
       
        $updatedPost = Post::find($id);
        $data = request()->post();
        $updatedPost->title = $data['title'];
        //$updatedPost->description = $data['description'];
        $updatedPost->user_id = $data['post_creator'];
        $updatedPost->save();
        return to_route('posts.index');
    
    //     $post=$request->all();

    //     foreach($this->posts as $p){
    //         if($p['id']==$id){
    //             $p = $request->all();
    //            break; 
    //         }
    //     }

    //     dd($this->posts);
        
    //     // $this->posts[$id]=$post;

    //     return view('posts.index',['allPosts' => $this->posts]);
      // return "updated";

    }


    public function destroy ($id){

        $user = Post::find($id);
        $user->delete();
        return to_route('posts.index'); 

    //     unset($this->posts[$id]);

    //    return view('posts.index',['allPosts' => $this->posts]);

       }
}