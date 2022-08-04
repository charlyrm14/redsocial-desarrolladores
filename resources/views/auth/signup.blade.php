@extends('layouts.app')

@section('title', 'Sign Up')
@section('page-title', 'Regístrate en CodeGram')

@section('content')
    
    <div class="md:flex md:justify-center md:gap-4 md:items-center">

        <div class="md:w-4/12">
            <img src="{{ asset('img/signup.png') }}" alt="Sign Up Image">
        </div>

        <div class="md:w-4/12 bg-white p-6 drop-shadow-2xl">
            <form action="{{ route('sign-up.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label  for="name" class="mb-1 block uppercase text-gray-500 font-bold"> Nombre </label>
                    <input  type="text" 
                            name="name" 
                            id="name" 
                            placeholder="Nombre completo" 
                            class="border p-2 w-full @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label  for="username" class="mb-1 block uppercase text-gray-500 font-bold"> Usuario </label>
                    <input  type="text" 
                            name="username" 
                            id="username" 
                            placeholder="Ejemplo: usuario1" 
                            class="border p-2 w-full @error('username') border-red-500 @enderror"
                            value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label  for="email" class="mb-1 block uppercase text-gray-500 font-bold"> Correo Electrónico </label>
                    <input  type="email" 
                            name="email" 
                            id="email" 
                            placeholder="Ejemplo: correo@correo.com" 
                            class="border p-2 w-full @error('email') border-red-500 @enderror"
                            value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label  for="password" class="mb-1 block uppercase text-gray-500 font-bold"> Contraseña </label>
                    <input  type="password" 
                            name="password" 
                            id="password" 
                            placeholder="********" 
                            class="border p-2 w-full @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror        
                </div>

                <div class="mb-5">
                    <label  for="password_confirmation" class="mb-1 block uppercase text-gray-500 font-bold"> 
                        Repetir contraseña 
                    </label>
                    <input  type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            placeholder="********" 
                            class="border p-2 w-full">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white"> Regístrarme </button>

            </form>
        </div>

    </div>

@endsection