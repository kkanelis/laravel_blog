<x-layout>
    <x-slot:title>
        {{ $post->content }}
    </x-slot:title>

    <div class="post-container">
        <div class="post-content">
            <h1 class="post-title">{{ $post->content }}</h1>
            <h1 class="post-category">Kategorija: {{ $post->category->category_name }}</h1>

            <div class="action-buttons">
                <a href="/posts/{{ $post->id }}/edit" class="edit-button">Rediģēt ierakstu</a>
                <form method="POST" action="/posts/{{ $post->id }}">
                    @csrf
                    @method("delete")
                    <button type="submit" class="delete-button">Izdzēst ierakstu</button>
                </form>
            </div>
        </div>
    </div>

    <div class="comments-container">
        <h2>Komentāri</h2>
        <form method="POST" action="/comments" class="comment-form">
            @csrf
            <input type="hidden" name="posts_id" value="{{ $post->id }}">
            <input name="author" placeholder="Autors" required>

            @error("author")
                <p class="error-message">{{ $message }}</p>
            @enderror

            <input name="comment" placeholder="Komentārs" required>

            @error("comment")
                <p class="error-message">{{ $message }}</p>
            @enderror

            <button type="submit">Pievienot komentāru</button>
        </form>

        @foreach ($post->comments->reverse() as $comment)
            <div class="comment">
                <div class="comment-header">
                    <strong class="comment-author">{{ $comment->author }}</strong>
                    <span class="comment-date">{{ $comment->created_at }}</span>
                </div>
                <p class="comment-text">{{ $comment->comment }}</p>
                <div class="comment-actions">
                    <a class="com-edit-button" href="/comments/{{ $comment->id }}/edit">Rediģēt</a>
                    <form method="POST" action="/comments/{{ $comment->id }}">
                        @csrf
                        @method("delete")
                        <button class="com-delete-button">Dzēst Komentāru</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>