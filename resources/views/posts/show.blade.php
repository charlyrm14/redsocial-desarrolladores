@extends('layouts.app')

@section('title', $post->title )
@section('page-title', $post->title )

@section('content')
<div class="container mx-auto md:flex">
    <div class="md:w-1/2 p-5">
        <img src="{{ asset( 'uploads/' . $post->image ) }}" alt="{{ $post->title }}" class="h-5/6 drop-shadow-2xl">


        <div class="p-3 flex items-center gap-2">
            @auth
                <livewire:like-post :post="$post">
            @endauth
            
        </div>

        

        <div class="pl-3">
            <p class="font-bold"> {{ $post->user->username }} </p>
            <p class="text-sm text-gray-500 text-inl"> 
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg> {{ $post->created_at->diffForHumans() }} 
            </p>
            <p class="mt-5">
                {{ $post->description }}
            </p>
        </div>

        @auth
            @if ( $post->user_id === auth()->user()->id )
            <form action="{{ route( 'post.destroy', $post ) }}" method="POST" class="mt-4">
                @method('DELETE')
                @csrf
                <button type="submit"
                        class="hover:text-red-500 p-2 cursor-pointer inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg> Eliminar
                </button>
            </form>
            @endif
        @endauth
        
    

    </div>
    <div class="md:w-1/2 p-5">
        <div class="shadow bg-white p-5 mb-5">

            @auth

            <p class="text-xl font-bold text-center mb-4"> Agrega un comentario </p>

            @if ( session('_success') )
                <div class="bg-green-500 p-2 mb-6 text-white text-center uppercase font-bold">
                    {{ session('_success') }}
                </div>
            @endif

            <form action="{{ route('comment.store', [ 'user' => $user, 'post' => $post ] ) }}" method="POST">
                @csrf
                

                <div class="mb-5">
                    <label  for="comment" class="mb-1 block uppercase text-gray-500 font-bold"> Comentario </label>
                    <textarea   name="comment" 
                                id="comment"
                                placeholder="Comentario"
                                class="border p-2 w-full @error('comment') border-red-500 @enderror">{{ old('comment') }}</textarea>
                    @error('comment')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer uppercase w-full p-2 text-white"> Publicar comentario </button>

            </form>
                
            @endauth

            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @forelse ( $post->comments as $comment )

                <div class="p-5 border-gray-300 border-b">
                    <a href="{{ route('post.index', $comment->user->username ) }}" class="text-sm text-gray-500 hover:text-blue-500">
                        {{ $comment->user->username }}
                    </a>
                    <p> {{ $comment->comment }} </p>
                    <p class="text-sm text-gray-500 text-inl mt-3"> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> {{ $comment->created_at->diffForHumans() }} 
                    </p>
                </div>

                @empty
                    <p class="p-10 text-center text-gray-500"> Se el primero en comentar </p>
                @endforelse
            </div>

            
        </div>
    </div>
</div>
@endsection