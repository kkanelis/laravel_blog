<x-layout>
    <x-slot:title>
        Bloga Ieraksti
    </x-slot:title>

    <div class="blog-container">
        <h1 class="blog-title">Bloga Ieraksti</h1>
        <ul class="post-list">
            @foreach ($posts as $post)
                <li><a href="/posts/{{ $post->id }}" class="post-link">{{ $post->content }}</a></li>
            @endforeach
        </ul>
            @if (count($posts) === 0)
                <p1>Nav izveidots neviens blogs</p1>
            @endif
    </div>
</x-layout>
