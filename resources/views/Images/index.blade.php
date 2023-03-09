<x-app-layout>

    <main class="p-24">
    @foreach($images as $image)
        <div>
            <h2>{{ $image->title }}</h2>
            <a href="image/show/{{$image->id}}"><img src="{{ asset($image->image) }}" alt=""></a>
    @endforeach
        </div>
    </main>
</x-app-layout>
