@extends('theme.default')

@section('heading')
edit post
@endsection

@section('content')
    <div class="container-fluid">
      <div class="card mb-3">
      
        <div class="card-header">
          <i class="fa fa-table"></i>  edit post
        </div>
        <div class="card-body">
          <div class="container">
            <form method="POST" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('Patch')
            

                <div class="col-lg-12 form-group">
                    <label for="body"> body </label>
                    <textarea class="form-control col" name="body" rows="3"  >{{$post->body}}</textarea>
                </div>
               <div class="col-lg-6 form-group">
                    <div class="col-lg-6 form-group">
                        <label for="approved">approved</label>
                        <input type="checkbox" class="" name="approved"  value="{{$post->approved}}" {{$post->approved ? 'checked' : ''}}>
                    </div>
                </div>
                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary mt-3">update </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')

@endsection