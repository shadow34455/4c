@extends('theme.default')

@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('heading')
blocked users
@endsection

@section('content')
<hr>
<div class="row">
    <div class="col-md-12">
        <table id="users-table" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>usrname</th>
                    <th>email</th>
                    <th>Date created</th>
                    <th>unblock</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($user as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans()}}</td>
                        <td>
                            <form method="POST" action="{{ route('user.unblock', $user)}}" style="display:inline-block">
                                @method('patch')
                                @csrf  

                                @if ($user->block)
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to unblock this user')"><i class="fa fa-lock-open"></i>unblock</button>  
                                @endif
                            </form>
                            
                        </td>
                    </tr>
                    @empty
                    <div class="mx-auto col-8">
                        <div class="alert alert-primary text-center" role="alert">
                            No Users Blocked     
                        </div>
                    </div>
                   
                   
                   
                @endforelse
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
        $('#users-table').DataTable({
        
        });
    });
</script>
@endsection