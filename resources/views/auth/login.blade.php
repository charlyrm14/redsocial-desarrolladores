@extends('layouts.app')

@section('title', 'Login')
@section('page-title', 'Inicia sesión en CodeGram')

@section('content')
    
    <div class="md:flex md:justify-center md:gap-4 md:items-center">

        <div class="md:w-4/12">
            <img src="{{ asset('img/signup.png') }}" alt="Login Image">
        </div>

        <div class="md:w-4/12 bg-white p-6 drop-shadow-2xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                
                @if ( session('wrongData') )
                <p class="text-red-500 text-center my-2 text-sm p-2 mb-2 border border-red-500"> 
                    {{ session('wrongData') }} 
                </p>                    
                @endif

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
                    <input type="checkbox" name="remember"> 
                    <label for="remember" class="text-gray-500 text-sm"> Recordarme </label> 
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-2 text-white"> Iniciar sesión </button>

            </form>
        </div>

    </div>

@endsection