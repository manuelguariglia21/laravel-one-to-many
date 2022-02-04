@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       <h1>Posts</h1>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                      <a href="{{route('admin.posts.show', $post->id)}}">Show</a>
                      <a href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                      <form onsubmit="return confirm('Confermi eliminazione di: {{$post->title}}')" action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn">Delete</button></td>
                      </form>
                    </td>
                </tr>
            @endforeach
    
        </tbody>
      </table>
    </div>
    <div class="categories">
      <h2>Categories</h2>
      @foreach ($categories as $category)

      <ul>
        {{$category->name}}
        
        @foreach ($category->posts as $post)

        <li>
          <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
        </li>
            
        @endforeach
      </ul>
          
      @endforeach
    </div>
</div>
@endsection