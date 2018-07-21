@extends('layouts/app');

@section('content')

@if (count($errors)>0)
  <ul class="list-group">
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        {{$error}}
      </div>
    @endforeach
  </ul>
@endif

<div class="card">
  <div class="card-header">
    <h3 class="text-center">Create New Category</h3>
  </div>
  <div class="card-body">

    <form method="post" action="{{route("category.store")}}">
      {{csrf_field()}}
      <fieldset class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" >
      </fieldset>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success">Add Category</button>
      </div>
    </form>

  </div>
</div>

@endsection
