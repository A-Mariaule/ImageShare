<x-app-layout>
    <p class="">{{$user->firstname}}</p>
    <p>{{$user->lastname}}</p>
    <p>{{$user->email}}</p>
    <p>{{$user->username}}</p>
    <img src="{{ asset($user->picture) }}" alt="" >

    @foreach($images as $image)
        @if($image->user_id == $user->id)
           <a href="../image/show/{{$image->id}}"> <img src="{{ asset($image->image) }}" alt="" ></a>
        @endif
    @endforeach
    @auth
    <a href="../profile">Edit</a>
    @endauth

</x-app-layout>