@extends('theme.default')
@section('head')
    <link href="{{ asset('theme/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('heading')
role
@endsection
@section('content')   
<div class="container mt-2">
    <h3 class="mb-3"></h3>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#User">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#All">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Customer">All Customer</a>
           
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Competito">All Competito</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Admin">All Admin</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="User">
            <div class="row border g-0 rounded shadow-sm">
                <div class="col p-4">
                    <form method="POST" action={{route('store.NewMessage')}}  enctype="multipart/form-data">
                        @csrf
                       <div class="form-group ">
                        <input  value="" class="form-control " name="to" placeholder="name ">
                    </div>
                       <div class="form-group ">
                        <input type="text" class="form-control" name="Subject" placeholder="subject">
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="body" placeholder="message "></textarea>
                    </div>
                    
                    <div class="text-center mt-4">
                    <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                    </div>
                    </form>
                </div>
            
            </div>
        </div>
        <div class="tab-pane" id="All">
            <div class="row border g-0 rounded shadow-sm">
                <div class="col p-4">
                
                    <form method="POST" action="{{route('send.all')}}"  enctype="multipart/form-data">
                        @csrf
                      
                       <div class="form-group ">
                        <input type="text" class="form-control" name="Subject" placeholder="subject">
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="body" placeholder="message "></textarea>
                    </div>
                    
                    <div class="text-center mt-4">
                    <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                    </div>  
                    </form>
                </div>
                <div class="col-auto">
                </div>
            </div>
        </div>
        <div class="tab-pane" id="Customer">
            <div class="row border g-0 rounded shadow-sm">
                <div class="col p-4">
                    <form method="POST" action="{{route('send.Customer')}}"  enctype="multipart/form-data">
                        @csrf
                       <div class="form-group ">
                        <input type="text" class="form-control" name="Subject" placeholder="subject">
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="body" placeholder="message "></textarea>
                    </div>
                    
                    <div class="text-center mt-4">
                    <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                    </div>
                    </form>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
        <div class="tab-pane" id="Competito">
            <div class="row border g-0 rounded shadow-sm">
                <div class="col p-4">
                    <form method="POST" action="{{route('send.Competito')}}"  enctype="multipart/form-data">
                        @csrf
                 
                       <div class="form-group ">
                        <input type="text" class="form-control" name="Subject" placeholder="subject">
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="body" placeholder="message "></textarea>
                    </div>
                    
                    <div class="text-center mt-4">
                    <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                    </div>
                    </form>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
        <div class="tab-pane" id="Admin">
            <div class="row border g-0 rounded shadow-sm">
                <div class="col p-4">
                    <form method="POST" action="{{route('send.admin')}}"  enctype="multipart/form-data">
                        @csrf
                 
                       <div class="form-group ">
                        <input type="text" class="form-control" name="Subject" placeholder="subject">
                    </div>
                    <div class="form-group mt-4">
                        <textarea class="form-control" name="body" placeholder="message "></textarea>
                    </div>
                    
                    <div class="text-center mt-4">
                    <button id="sendEmail" class="btn btn-primary btn-block ">Send</button>
                    </div>
                    </form>
                </div>
                <div class="col-auto">
                    
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 @endsection
 