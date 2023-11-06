<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
<x-app-layout>

    {{-- <div class="col-md-8 bg-white"> --}}
    {{-- <h2 class="my-4">
     Task
    @foreach($tasks as $task)
    <div class="card mb-4">
    <div class="card-body">
    <h3 class="card—title">{{ $task->title }}</h3>
    <p class="card—text">{{\Illuminate\Support\Str::limit($task->body,100) }}</p>
    <a href="{{ route('task.show', $task->id) }}" class="btn btn—primary"> more</a> 
   
    </div>
    </div>
    @endforeach
    </h2> --}}
    {{-- <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20"style="width:800px; margin:0 auto;">
    @foreach($tasks as $task)
    <div class="m-20 p-10 max-w-2xl drop-shadow-m rounded-lg bg-white hover:bg-slate-50 transition-colors flex flex-row">
    
        <div class="basis-3/4">
          <p class="font-semibold text-lg mb-2">{{ $task->title }}</p>
          <p class="font-thin">{{\Illuminate\Support\Str::limit($task->body,100) }}<</p>
     <a href="{{ route('task.show', $task->id) }}" class="btn btn—primary"><button >More about the red fox</button></a> 
        </div>
    </div>
    @endforeach
     </div>  --}}
     <a href="{{ route('publicservices.create') }}">
     <button class="bg-blue-500 active:bg-pink-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
      question
    </button></a>
      @foreach($tasks as $task)
     {{-- <div style="width:800px; margin:0 auto;">
     --}}
     <br>
     <div class="max-w-md py-4 px-8 bg-white shadow-lg rounded-lg my-20" style="width:800px; margin:0 auto;">
        <div>
          <h2 class="text-gray-800 text-3xl font-semibold">{{ $task->title }}</h2>
          <p class="mt-2 text-gray-600 text-break">{!!\Illuminate\Support\Str::limit($task->body,100) !!}</p>
        </div>
        <div class="flex justify-end mt-4">
         <p>{{ $task->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex justify-end mt-4">
          <a href="{{ route('task.show', $task->id) }}" class="text-xl font-medium text-indigo-500">more</a>
        </div>
      </div>
      @endforeach
    {{-- </div>  --}}
</x-app-layout>

