@extends('layout.app')

@section('title') View @endsection

@section('content')
<div class="card bg-light mt-5" >
  <div class="card-header">Post Info</div>
  
</div>
<div class="card bg-light mt-5" style="max-width: 18rem,text-align:center;">

  <div class="card-header">Post Creator Info</div>
  <div class="card-body">
      <div class="p-2">
       <h5 class="card-title" style="font-size:18px;display:inline;">Title:-</h5>
       <p class="card-text" style="display:inline;">{{$post["title"]}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">posted By:-</h5>
      <p class="card-text" style="display:inline;">{{$post["posted_by"]}}</p>
      </div>
      <div class="p-2">
      <h5 class="card-title" style="font-size:18px;display:inline;">Created At:-</h5>
    <p class="card-text" style="display:inline;">{{$post["created_at"]}}</p>
      </div>





  </div>
</div>
  @endsection