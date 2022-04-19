@extends('layouts.app')

@section('title') View @endsection

@section('content')
<div class="card bg-light mt-5" >
  <div class="card-header">Post Info</div>
  
</div>
<div class="card bg-light mt-5" style="max-width: 18rem;">

  <div class="card-header">Post Creator Info</div>
  <div class="card-body">
      <div class="p-2">
        <div>
      <img  width="150px" height="100px" src='{{asset("/storage/images/posts/".$post->image)}}' /> </div>
       <h5 class="card-title" style="font-size:18px;display:inline;">Title:-</h5>
       <p class="card-text" style="display:inline;">{{$post["title"]}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">posted By:-</h5>
      <p class="card-text" style="display:inline;">{{$post->user ? $post->user->name : 'not found'}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">Created At:-</h5>
    <p class="card-text" style="display:inline;">{{$post['created_at']->format('l jS \\of F Y h:i:s A')}}</p>
      </div>





  </div>
</div>
  @endsection