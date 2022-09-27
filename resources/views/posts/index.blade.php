@extends('layout')

@section('content')

<div class="m-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg lg:grid lg:grid-cols2 gap-4">
   @forelse ($posts as $post)
      <div class="bg-gray-50 border border-gray-200 p-10 rounded">
         <h3 class="m-4"><a href="/posts/{{$post->id}}">
            {{$post->title}}
         </a></h3>
         <p >by {{$post->user->name}}</p>
      </div>
   @empty
      <p>No Posts</p>
   @endforelse
</div>
@endsection