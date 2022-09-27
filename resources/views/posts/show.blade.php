@extends('layout')
@section('content')
<div class="m-8 p-4 bg-gray-50 dark:bg-gray-800 shadow sm:rounded-lg lg:grid lg:grid-cols2 gap-4">

   <h1 class="text-xl font-extrabold">{{$post->title}}</h1>
   <div>{{$post->content}}</div>

   <ul class="my-2 p-4 bg-white sm:rounded-lg">
      <h3 class="text-lg font-bold mb-4">Comments :</h3>

      @forelse ($post->comments as $comment)
         <li class="border-b">
            <p>
               <div id="{{$comment->id}}-comment-content">{{$comment->content}}</div>
               
               <form action="{{route('comments.update', $comment)}}" method="POST" class="hidden" id="{{$comment->id}}-edit-form">
                  @csrf
                  @method('PUT')
                  <input type="text" value="{{$comment->content}}" class="w-full">
                  <label>Press enter to submit</label>
               </form>
            </p>
            <div class="flex mx-4">
               <button id="{{$comment->id}}-edit-btn" class="comment-edit-btn  text-blue-500 hover:underline">
                  Edit
               </button>
               <form action="{{route('comments.destroy', $comment)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="mx-4 text-red-500">
                     <i class="fa-solid fa-trash-can"></i>
                  </button>
               </form>
               
            </div>
         </li>       
      @empty
          No comments.
      @endforelse
      <form action="{{route('comments.store')}}" method="POST" class="flex m-4 items-center">
         @csrf
         <label for="">Add a comment & press Enter</label>
         <input type="text" name="content" class="flex-1 mx-4">
         <input type="hidden" name="post_id" value="{{$post->id}}">
      </form>
   </ul>


   <x-notification-component :notifs="auth()->user()->notifications" />

   <script>
      const editBtns = document.querySelectorAll('.comment-edit-btn');
      editBtns.forEach(button => button.addEventListener('click', toggleEditForm));
      function toggleEditForm(e){
         const targetForm = document.getElementById(e.target.id.slice(0, -3) + 'form')
         const targetContent = document.getElementById(e.target.id.slice(0, -8) + 'comment-content')
         console.log(e.target.id.slice(0, -8) + 'comment-content')
         targetForm.classList.toggle('hidden');
         targetContent.classList.toggle('hidden');
      }
   </script>
   
</div>
@endsection