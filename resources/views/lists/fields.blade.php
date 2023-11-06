@foreach($fields as $fi)
<option value="{{ $fi->id }}"> {{ $fi->title }}</option>
@endforeach