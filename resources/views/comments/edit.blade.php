<x-layout>

    <x-slot:title>
        Komentāra rediģēšana
    </x-slot:title>

    <div class="edit-comment-container">
        <h1>Komentāra rediģēšana</h1>
        <h2>{{ $comment->comment }}</h2>

        <form method="POST" action="/comments/{{ $comment->id }}" class="edit-comment-form">
            @csrf
            @method('PUT')
            <input name="author" value="{{ $comment->author }}" placeholder="Autors" required>
            <input name="comment" value="{{ $comment->comment }}" placeholder="Komentārs" required>
            <button type="submit">Rediģēt komentāru</button> 
        </form>
    </div>

</x-layout>
