@extends('layouts.app')

@section('title')Update post @endsection

@section('content')


      <form method="POST" action="{{route('posts.store')}}" class="mt-5">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">description</label>
            <textarea name="description" class="form-control" id="exampleFormControlInput1" ></textarea>
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
            <label for="exampleFormControlInput1" class="form-label">Created At</label>
            <input name="created_at" type="date" class="form-control" id="exampleFormControlInput1">
       </div>

          <div class="mb-3">
                <button type="submit" class="btn btn-success">Create Post</button>
          </div>
        </form>
@endsection