<x-app-layout>
    <h1 class="font-bold text-center m-5 text-4xl">ImageShare</h1>
    <main class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 m-5">
    @foreach($images as $image)
        <div class="relative w-full h-64">
            <a href="image/show/{{$image->id}}"class ="absolute inset-0 bg-inherit flex items-center justify-center hover:opacity-70"><img src="{{ asset($image->image) }}" alt="" class="object-cover w-full h-full"><span class="absolute inset-0 flex items-center justify-center text-white font-bold text-lg opacity-0 hover:opacity-100">Show</span></a>
        </div>
    @endforeach
    </main>
</x-app-layout>
