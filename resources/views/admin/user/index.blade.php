@extends('layouts.app')

@section('content')

<div class="card">
  <div class="card-header text-center"><h3>All Users</h3></div>

  <div class="card-body">
    <table class="table">
      <thead class="thead-light">
        <tr>
          <th>Featured</th>
          <th>Name</th>
          <th>Admin</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>

            <td>
              @if($user->profile != NULL)
                <img src="{{$user->profile->picture}}" width="90px" height="70px" alt="image" class="rounded-circles">
              @endif
            </td>
            <td><br>{{$user->name}}</td>
            <td><br>
              <a href="" type="button" class="btn btn-info btn-sm">
              @if($user->admin)
                remove privelage
              @else
                make as Admin
              @endif
              </a></td>
            <td><br><a href="" type="button" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
