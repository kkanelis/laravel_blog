<x-layout>

    <x-slot:title>
        Bloga rediģēšana
    </x-slot:title>

    <div class="edit-blog-container">
        <h1>Bloga rediģēšana</h1>
        <h2>{{ $post->content }}</h2>

        <form method="POST" action="/posts/{{ $post->id }}" class="edit-blog-form">
            @csrf
            @method('PUT')
            <input name="content" value="{{ $post->content }}" placeholder="Ieraksta saturs" required>
                
                @error("content")
                    <p class="error-message">{{ $message }}</p>
                @enderror

            
                <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button type="submit">Rediģēt ierakstu</button> 
        </form>
    </div>

</x-layout>
