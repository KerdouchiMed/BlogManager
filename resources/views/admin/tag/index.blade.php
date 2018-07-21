@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header text-center"><h3>All Tags</h3></div>

  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>Name</th>
          <th>Deleting</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tags as $tag)
          <tr>
            <td>{{$tag->name}}</td>
            <td><a href="{{route('tag.delete',$tag->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
