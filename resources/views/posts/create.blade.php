<x-layout>

    <x-slot:title>
        Ieraksta izveidošana
    </x-slot:title>

    <div class="form-container">
        <h1>Ieraksta izveidošana</h1>

        <form method="POST" action="/posts">
            @csrf

            {{-- Content --}}
            <input name="content" placeholder="Ieraksta saturs" required>

            @error("content")
            <p class="error-message">{{ $message }}</p>
            @enderror

            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <button type="submit">Pievienot ierakstu</button>

        </form>
    </div>

</x-layout>
