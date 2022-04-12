<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   private $posts = [
       ['id' => 1, 'title' => 'first post', 'posted_by' => 'nehal', 'created_at' => '2022-04-11'],
       ['id' => 2, 'title' => 'second post', 'posted_by' => 'mohsen', 'created_at' => '2022-04-11'],
       ['id' => 3, 'title' => 'third post', 'posted_by' => 'lotfy', 'created_at' => '2022-04-11'],

   ];
    public function index()
    {

       return view('posts.index',['allPosts'=>$this->posts]);


    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $postData=request()->all();

        $post=[
            "id"=>count($this->posts )+1,
            "title" => request()["title"],
            "posted_by" => request()['postedby'],
            "created_at" => request()['createdat']
        ];


       array_push($this->posts,$post);


         return view('posts.index',['allPosts' => $this->posts]);



    }

    public function show($post)
    {
        foreach($this->posts as $p){
            if($p['id']==$post){
                return view('posts.show',['post'=>$p]);
            }
        }
        return abort(404);
    }

    public function edit($id){


        foreach($this->posts as $p){
            if($p['id']==$id){
                return view('posts.edit',['post'=>$p]);
            }
        }
        return abort(404);
    }

    public function update($id,Request $request){
       
        $post=$request->all();

        foreach($this->posts as $p){
            if($p['id']==$id){
                $p = $request->all();
               break; 
            }
        }

        dd($this->posts);
        
        // $this->posts[$id]=$post;

        return view('posts.index',['allPosts' => $this->posts]);
       

    }


    public function destroy ($id){

        unset($this->posts[$id]);

       return view('posts.index',['allPosts' => $this->posts]);

       }
}