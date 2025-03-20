<x-layout>

    <x-slot:title>
        {{ $category->category_name }}
    </x-slot:title>

    <div class="post-container">
        <div class="post-content">
        <h1 class="post-title">{{ $category->category_name }}</h1>

        @foreach ( $category->posts as $posts)
            <a href="/posts/{{ $posts->id }}"><h1 style="font-size: 20px;"class="comment-text"> {{ $posts->content }}</h1></a>
        @endforeach

        <div class="action-buttons">
            <a href="/categories/{{ $category->id }}/edit" class="edit-button">Rediģēt kategoriju</a>

            <form method="POST" action="/categories/{{ $category->id }}">
                @csrf
                @method("delete")
                <button type="submit" class="delete-button">Izdzēst kategoriju</button>
            </form>
        </div>  
    </div>

</x-layout>