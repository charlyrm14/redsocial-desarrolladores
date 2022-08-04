<div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 p-4">
    @forelse ( $posts as $post )
        <div>
            <a href="{{ route('post.show', [ 'user' => $post->user, 'post' => $post ] ) }}">
                <img src="{{ asset( 'uploads/' . $post->image ) }}" alt="{{ $post->title }}">
            </a>
        </div>
    @empty
        <p class="text-center text-gray-500"> Sigue a alguien para ver lo que comparten </p>
    @endforelse
</div> 