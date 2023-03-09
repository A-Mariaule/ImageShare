<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

</body>
</html>