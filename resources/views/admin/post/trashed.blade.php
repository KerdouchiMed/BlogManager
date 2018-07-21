@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header text-center"><h3>All Posts</h3></div>

  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>Featured</th>
          <th>Title</th>
          <th>Restore</th>
          <th>Deleting</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td><img src="{{$post->featured}}" width="90px" height="70px" alt="image" class="rounded-circles"></td>
            <td><br>{{$post->title}}</td>
            <td><br><a href="{{route('post.restore',$post->id)}}" type="button" class="btn btn-info btn-sm">Restor</a></td>
            <td><br><a href="{{route('post.delete',$post->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
