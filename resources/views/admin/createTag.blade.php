@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
add
@endsection
@section('content')
<form method="POST" action="{{route('admin.newtag')}}"  enctype="multipart/form-data">
    @csrf
   <div class="form-group">
       <input type="text" class="form-control" name="tag" id="tag" placeholder="tag" value="" required>
   </div>

  <div class="form-floating">
    <textarea class="form-control" name="description" placeholder="description" id="description"></textarea>

  </div>
  <div class="form-group mt-3">
   <button type="submit" class="btn btn-primary">submit</button>
</div>
</form>

    @endsection
 