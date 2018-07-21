@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header text-center"><h3>All Categories</h3></div>

  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>Name</th>
          <th>Editing</th>
          <th>Deleting</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{$category->name}}</td>
            <td><a href="{{route('category.edit',$category->id)}}" type="button" class="btn btn-info btn-sm">Edite</a></td>
            <td><a href="{{route('category.delete',$category->id)}}" type="button" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
