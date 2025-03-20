<x-layout>

    <x-slot:title>
        Izveidot kategoriju
    </x-slot:title>

    <div class="form-container">
        <h1>Kategorijas izveidošana</h1>

        <form method="POST" action="/categories">
            @csrf

            <input name="category_name" placeholder="Kategorijas nosaukums" required>
                
                @error("category_name")
                    <p class="error-message">{{ $message }}</p>
                @enderror

            <button type="submit">Pievienot kategoriju</button>

        </form>
    </div>

</x-layout>