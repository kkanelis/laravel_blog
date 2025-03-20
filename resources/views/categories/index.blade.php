<x-layout>

    <x-slot:title>
        Kategorijas
    </x-slot:title>


    <div class="blog-container">
        <h1 class="blog-title">Kategorijas</h1>
        <ul class="post-list">
            @foreach ($categories as $category)
                <li><a href="/categories/{{ $category->id }}"class="post-link">{{ $category->category_name }}</a></li>
            @endforeach
        </ul>
            @if (count($categories) === 0)
                <p1>Nav izveidota neviena kategorija</p1>
            @endif
    </div>

</x-layout>