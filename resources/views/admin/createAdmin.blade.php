@extends('theme.default')
@section('heading')
add
@endsection
@section('content')
<form method="POST" action="{{ route('admin.newadmin') }}">
  @csrf

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password"id="password">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
  <select name="role" required class="browser-default custom-select" aria-label="Default select example">
  <option selected disabled value="">Choose...</option>
    <option value="0">SuperAdmin</option>
    <option value="1">Admin</option>
  
</select>
</div>
<div class="mb-3">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
 
    @endsection