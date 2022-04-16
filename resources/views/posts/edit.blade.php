@extends('layouts.app')

@section('title')Create @endsection

@section('content')
        <form class="col-6 mx-auto my-5" method="POST"   action="{{ route('posts.update',['post' => $postShow['id']]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="exampleInputTitle" class="form-label">Title</label>
              <input name="title" value="{{$postShow->title}}" type="text" class="form-control" id="exampleInputTitle" >
            </div>

            <div class="mb-5">
        <label class="form-label d-block">Description</label>
        <textarea rows="5" name="description" class="w-100 form-control">{{$postShow->description}}</textarea>
    </div>


              <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">'posted By'</label>
            <select class="form-control" name="post_creator" >
              @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>

              <div class="mb-3">
                <label for="exampleInputDate" class="form-label">Created At</label>
                <input name="created_at" value="{{$postShow->created_at}}" type="date" class="form-control"  id="exampleInputDate">
              </div>

            <button type="submit" class="btn btn-success">update Post</button>
          </form>
          @endsection