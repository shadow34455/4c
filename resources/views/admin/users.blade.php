
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
        <table id="table_id" class="table table-stribed text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Edite</th>
                    <th>Delete</th>
                    <th>Ban</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->isAdmin() ? 'Admin' : ($user->isPersonal_accounr() ? 'Personal account' : 'Business account') }}</td>
                        <td>
                            <form class="ml-4 form-inline" method="POST" action="{{ route('user.update', $user) }}" style="display:inline-block">
                                @method('patch')
                                @csrf
                                <select class="form-control form-control-sm" name="role">
                                    <option selected disabled>Choose....</option>
                                    <option value="1">Admin</option>
                                    <option value="2">customers</option>
                                    <option value="3">competer</option>
                                </select>
                                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edite</button> 
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('user.delete', $user) }}" style="display:inline-block">
                                @method('delete')
                                @csrf
                                @if (auth()->user() != $user && !$user->isAdmin())
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user')"><i class="fa fa-trash"></i> delete</button> 
                                @else
                                    <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> delete </div>
                                @endif
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('user.block', $user) }}" style="display:inline-block">
                                @method('patch')
                                @csrf
                                @if (auth()->user() != $user && !$user->isAdmin())
                                    @if ($user->block)
                                    <div class="btn btn-warning btn-sm disabled"><i class="fas fa-lock"></i> blocked </div> 
                                    @else
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to block this channel')"><i class="fa fa-lock"></i> block</button> 
                                    @endif
                                @else
                                    <div class="btn btn-warning btn-sm disabled"><i class="fas fa-lock"></i> block </div>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"
></script>
<script
        type="text/javascript"
        charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $("#table_id").dataTable();
    });
</script>
    </div>
</div>
@endsection

@section('script')

@endsection 