@extends('layouts.app')

@section('title', 'Mi Cuenta')
@section('page-title', 'Perfil')

@section('content')
    <div class="flex justify-center">

        <div class="w-full md:w-8/12 lg:w-6/12 md:flex">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset( $user->profile_picture ? 'uploads/' . $user->profile_picture : 'img/usuario.svg') }}" alt="Avatar" class="h-48 w-full md:h-full md:w-48 rounded-full">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5">

                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-xl"> {{ $user->name }} </p>

                    @auth

                        @if ( $user->id === auth()->user()->id )
                            <a href="{{ route('profile.index') }}" class="cursor-pointer hover:text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        @endif 

                    @endauth

                </div>

                <p class="text-gray-400 text-lg"> {{ $user->username }} </p>

                <div class="flex items-center justify-between mt-5 md:gap-3">
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->followers->count() }} 
                            <span class="font-normal block"> 
                                @choice('Seguidor|Seguidores', $user->followers->count()) 
                            </span>
                    </p>
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->followings->count() }} <span class="font-normal block"> Siguiendo </span>
                    </p>
                    <p class="text-gray-800 text-sm font-bold">
                        {{ $user->posts->count() }} <span class="font-normal block"> Publicaciones </span>
                    </p>
                </div>

                @auth

                    @if ( $user->id !== auth()->user()->id )

                        @if ( !$user->followingCheck( auth()->user() ) )
                            
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf

                                <button type="submit" class="mt-5 bg-blue-500 text-white rounded-full px-3 py-1 cursor-pointer hover:bg-blue-700">
                                    Seguir
                                </button>

                            </form>

                        @else
                            
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="mt-5 bg-gray-400 text-white rounded-full px-3 py-1 cursor-pointer hover:bg-gray-500">
                                    Dejar de seguir
                                </button>

                            </form>

                        @endif

                    @endif
                    
                @endauth

                
                

            </div>
        </div>

    </div>

    <section class="container mx-auto mt-10">
        <h2 class="text-3xl text-center font-black my-10"> Publicaciones </h2>

        <x-post-list :posts="$posts"/>
        
        <div class="my-10">
            {{ $posts->links() }}
        </div>

    </section>
@endsection