@extends('layouts.app')

@section('title', 'Mi Perfil')
@section('page-title', 'Editar perfil')

@section('content')

    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label  for="username" class="mb-1 block uppercase text-gray-500 font-bold"> Usuario </label>
                    <input  type="text" 
                            name="username" 
                            id="username"
                            placeholder="Ejemplo: usuario1" 
                            class="border p-2 w-full @error('username') border-red-500 @enderror"
                            value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label  for="image" class="mb-1 block uppercase text-gray-500 font-bold"> Imagen perfil </label>
                    <input  type="file" 
                            name="image" 
                            id="image" 
                            class="border p-2 w-full"
                            accept=".jpg, .jpeg, .png, .gif">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white"> Actualizar perfil </button>

            </form>
        </div>
    </div>

@endsection