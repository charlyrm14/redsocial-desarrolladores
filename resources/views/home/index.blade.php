@extends('layouts.app')

@section('title', 'Inicio')
@section('page-title', 'Inicio')

@section('content')

<div class="container mx-auto md:flex">
    
    <div class="md:w-3/5 p-5">
        @forelse ( $posts as $post )
        <div class="max-w-xl rounded overflow-hidden shadow-lg mb-10">
            <a href="{{ route('post.show', [ 'user' => $post->user, 'post' => $post ] ) }}">
                <img src="{{ asset( 'uploads/' . $post->image ) }}" alt="{{ $post->title }}" class="w-full">
            </a>
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2"> {{ $post->title }} </div>
                <p class="text-gray-700 text-base">
                    {{ $post->description }}
                </p>
                <p class="font-bold mt-5 text-xs"> {{ $post->user->username }} </p>
                <p class="text-xs text-gray-500 text-inl"> 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> {{ $post->created_at->diffForHumans() }} 
                </p>
            </div>
        </div>
        @empty
            <p class="text-center text-gray-500"> Sigue a alguien para ver lo que comparten </p>
        @endforelse

    </div>

    <div class="md:w-2/5">
        

        <div class="w-full text-gray-900 bg-white border border-gray-200 rounded-lg mt-5">
            <a href="{{ route('profile.index') }}" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 rounded-t-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                Perfil
            </a>

            <a href="{{ route('post.create') }}" class="relative inline-flex items-center w-full px-4 py-2 text-sm font-medium border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                <svg class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />    
                </svg>
                Nueva publicación
            </a>

        </div>

    </div>

</div>

@endsection