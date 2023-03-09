<x-app-layout>
    <main class="p-24">
        <div class="bg-white rounded-lg shadow-md p-4 mt-4 w-64 flex flex-col items-center">
            <h2>{{ $image->title }}</h2>
            <img src="{{ asset($image->image) }}" alt="">
            <p class="mt-2">{{ $image->description}}</p>
            @foreach($users as $user)
                @if($image->user_id==$user->id)
                   <a href="../../profile/{{$user->id}}" ><p class="mt-1">{{ $image->user->username}}</p></a>
                @endif
            @endforeach
            @auth
            <a href="/image/edit/{{$image->id}}" class="mt-2">Edit</a>
            <form action="/image/destroy/{{$image->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete">
            </form>
            @endauth
        </div>
    </main>
</x-app-layout>