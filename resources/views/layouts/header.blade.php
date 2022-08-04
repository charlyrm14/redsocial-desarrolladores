<header class="p-5 border-b bg-white shadow">

    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-3xl font-black"> 
            CodeGram
        </a>

        <nav class="flex gap-4 items-center">

            @auth
            <a  class="flex items-center gap-2 border border-blue-500 p-2 rounded-full" 
                href="{{ route('post.create') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>

            <div class="group flex items-center">
                <a href="{{ route('post.index', auth()->user()->username ) }}">
                    <img class="shrink-0 h-12 w-12 rounded-full" src="{{ asset( auth()->user()->profile_picture ? 'uploads/' . auth()->user()->profile_picture : 'img/usuario.svg') }}" alt="header avatar" />
                </a>
                <div class="ltr:ml-3 rtl:mr-3 ml-1">
                    <a  class="text-sm font-medium text-slate-500 group-hover:text-slate-300" 
                        href="{{ route('post.index', auth()->user()->username ) }}">
                        {{ auth()->user()->name }}
                    </a>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button  type="submit" class="border border-red-500 text-black text-sm rounded-full p-2 hover:bg-red-500 hover:text-white"> 
                    Cerrar sesión
                </button>
            </form>
            @endauth

            @guest
            <a  class="text-gray-600 text-sm font-bold uppercase" href="{{ route('login') }}"> Login </a>
            <a  class="bg-blue-500 text-white text-sm font-bold uppercase rounded-full p-2 hover:bg-white hover:text-black hover:border hover:border-blue-500" href="{{ route('sign-up.index') }}"> Sign up </a>
            @endguest
            
        </nav>

    </div>

</header>
