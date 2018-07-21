@extends('layouts/app')

@section('content')


  @if(count($errors)>0)
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
      <h3 class="text-center">Create New Post</h3>
    </div>
    <div class="card-body">


        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
          {{csrf_field()}}
          <fieldset class="form-group">
            <label for="title">Title</label>
            <input type="text" name='title' class="form-control">
          </fieldset>

          <fieldset class="form-group">
            <label for="featured">Featured Image</label>
            <input type="file" name='featured' class="form-control">
          </fieldset>


          <div class="form-group">
            <label for="category">Category</label>
            <select name='category_id' class="form-control">
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>


          <label for="tag">Tags</label>
          <div class="row">
            @foreach ($tags as $tag)
                <div class="col-md-12">
                <div class="form-check">
                 <input type="checkbox" name="tags[]" value="{{$tag->id}}" class="form-check-input" >
                 <label class="form-check-label"  for="tag">{{$tag->name}}</label>
               </div>
               </div>
            @endforeach
          </div>

          <div class="form-group" >
            <label for="content">Describtion</label>
            <textarea cols='5' rows='4' name='content' class="form-control"></textarea>
          </div>

          <br>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-success"> Create Post </button>
          </div>

        </form>
    </div>
  </div>

@endsection
