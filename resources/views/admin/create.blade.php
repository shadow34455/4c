@extends('theme.default')
@section('heading')
add
@endsection
@section('content')
<form method="POST" action="{{route('task.store')}}"  enctype="multipart/form-data">
    @csrf
   <div class="form-group">
       <select class="form-control" name="field_id">
        @include('lists.fields')
       </select>
   </div>
   <div class="form-group">
       <input type="text" class="form-control" name="title" id="title" placeholder="title" value="" required>
   </div>
   <div class="form-group">
    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="" required>
</div>
   <div class="form-group">
       <textarea class="form-control" name="body" rows="3" placeholder="body" id="editor" ></textarea>
   </div>
   <div class="form-group">
    approved
   <input type="checkbox" name="approved" value="1">
</div>
   <button type="submit" class="btn btn-primary">submit </button>
</form>

   <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
   <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            ckfinder: {
                uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}'
            }
        },{
            alignment: {
                options: [ 'right', 'right' ]
            }} )
        .then( editor => {
            console.log( editor );
        })
        .catch( error => {
            console.error( error );
        })

</script>
    @endsection
 