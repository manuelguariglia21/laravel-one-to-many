@extends('layouts.admin')

@section('content')
<div class="container">
       <h1>Create New Post</h1>
       
       <form action="{{route('admin.posts.update', $post)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control" id="title" placeholder="Enter title">
            
          </div>

          <div class="form-group">
            <label for="descriptiom">Description</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="Enter description">{{$post->description}}
            </textarea>
          </div>

          <button type="submit" class="btn btn-primary">Aggiorna Post</button>
          <button type="reset" class="btn btn-secondary" >Reset</button>
      </form>
</div>
@endsection