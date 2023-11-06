@extends('theme.default')
@section('heading')
add
@endsection
@section('content')
<form method="POST" action="{{route('field.store')}}" enctype="multipart/form-data">
    @csrf
   <div class="form-group">
 
   </div>
   <div class="form-group">
       <input type="text" class="form-control" name="title" id="title" placeholder="title" value="" required>
   </div>
   <div class="form-group">
    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="" required>
</div>
   <div class="form-group">
       <textarea class="form-control" name="Description" rows="3" placeholder="Description" ></textarea>
   </div>
   {{-- <div class="mt-4">
    <x-jet-label value="{{ __('Image') }}" />
    <x-jet-input class="block mt-1 w-full bg-white p-2" type="file" name="image_path" :value="old('image_path')"    />
</div> --}}
<div class="mb-3">
    <label for="formFile" class="form-label">Image</label>
    <input class="form-control" type="file" name="imge_path" id="imge_path" required>
  </div>
   {{-- <div class="form-group">
    approved
   <input type="checkbox" name="approved" value="1"> --}}
{{-- </div> --}}
   <button type="submit" class="btn btn-primary">submit </button>
</form>
    @endsection
