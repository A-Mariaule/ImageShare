<x-app-layout>
    <main class="">
        <section class="p-6">
            <p class="text-lg font-bold mb-2">{{$user->firstname}} {{$user->lastname}}</p>
            <img src="{{ asset($user->picture) }}" alt="" class="rounded-full w-32 h-32 object-cover mb-4">
            <p class="text-gray-700 mb-2">{{$user->email}}</p>
            <p class="text-gray-700 mb-4">{{$user->username}}</p>
            @auth
                <a href="../profile" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Edit Profile
                </a>
            @endauth
        </section>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 m-5">
            @foreach($images as $image)
                @if($image->user_id == $user->id)
                    <div class="relative w-full h-64">
                        <a href="../image/show/{{$image->id}}" class ="absolute inset-0 bg-inherit flex items-center justify-center"> <img src="{{ asset($image->image) }}" alt=""class="object-cover w-full h-full" ></a>
                    </div>
                @endif
            @endforeach
        </section>
    </main>

</x-app-layout>