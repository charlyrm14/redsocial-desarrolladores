@extends('layouts.app')

@section('title', 'Nueva publicación')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@push('js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endpush

@section('page-title', 'Nueva publicación')


@section('content')
    <div class="md:flex md:items-center">

        <div class="md:w-1/2 px-10">
            <form action="{{ route('images.store') }}" id="dropzone" class="dropzone border-dashed border border-blue-500 w-full h-96 rounded flex flex-col justify-center items-center" enctype="multipart/form-data">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white drop-shadow-2xl mt-10 md:mt-0">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf

                <div class="mb-5">
                    <label  for="title" class="mb-1 block uppercase text-gray-500 font-bold"> Título </label>
                    <input  type="text" 
                            name="title" 
                            id="title" 
                            placeholder="Añade un título" 
                            class="border p-2 w-full @error('title') border-red-500 @enderror"
                            value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label  for="description" class="mb-1 block uppercase text-gray-500 font-bold"> Descripción </label>
                    <textarea   name="description" 
                                id="description"
                                placeholder="Descripción"
                                class="border p-2 w-full @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="image" value="{{ old('image') }}">
                    @error('image')
                        <p class="text-red-500 my-2 text-sm p-1"> 
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer uppercase w-full p-2 text-white"> Publicar </button>

            </form>
        </div>
    </div>
@endsection