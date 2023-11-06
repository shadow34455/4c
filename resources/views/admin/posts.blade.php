@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
role
@endsection

@section('content')

<hr>
<div class="row">
    <div class="col-md-12">
        <table id="user-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                  <th>Id</th>
                  <th>username  </th>    
                  <th>body</th>
                  <th>approved  </th>
                  <th>field  </th> 
                  <th>edit  </th>
                  <th>DELETE  </th>
                </tr>
            </thead>

            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->username}}</td>
                <td>{!! \Illuminate\Support\Str::limit($post->body,100)!!}</td>

                <td><input type="checkbox" value="{{$post->approved}}" {{$post->approved ? 'checked' : ''}} @disabled(true)></td>
                <td>{{$post->fields->titel ?? 'no field!'}}</td> 
        
      
              <td>
                <a href="{{ route('posts.edit',$post->id) }}">
                  <i class="fa fa-edit fa-2x"></i>                                
                </a>
              </td>        
                <td>
                  <form method="POST" action="{{ route('posts.delete', $post) }}" style="display:inline-block">
                    @method('delete')
                    @csrf
                   <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post')"><i class="fa fa-trash"></i> delete</button>              
                </form>
                </td>
              </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('script')
<!-- Page level plugins -->
<script src="{{ asset('theme/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#user-table').DataTable({
        
        });
    });
</script>
@endsection 