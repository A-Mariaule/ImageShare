<x-app-layout>

    <main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 m-5">
    @foreach($images as $image)
        <div class="relative w-full h-64">
            <a href="image/show/{{$image->id}}"class ="absolute inset-0 bg-inherit flex items-center justify-center"><img src="{{ asset($image->image) }}" alt="" class="object-cover w-full h-full"></a>
        </div>
    @endforeach
    </main>
</x-app-layout>
