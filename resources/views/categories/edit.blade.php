<x-layout>

    <x-slot:title>
        Rediģēt kategoriju
    </x-slot:title>

    <div class="edit-blog-container">
        <h1>Kategorijas rediģēšana</h1>
        <h2>{{ $category->category_name }}</h2>

        <form method="POST" action="/categories/{{ $category->id }}" class="edit-blog-form">
            @csrf
            @method('PUT')
            <input name="category_name" value="{{ $category->category_name }}" placeholder="Ieraksta saturs" required>
            <button type="submit">Rediģēt kategoriju</button> 

            @error("category_name")
                <p class="error-message">{{ $message }}</p>
            @enderror
        </form>
    </div>

</x-layout>
