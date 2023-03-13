<x-app-layout>
    <main class="">
        <section class="p-6 flex ">
            <div class="">
                <img src="{{ asset($user->picture) }}" alt="" class=" w-80 h-80 object-cover mb-4">
            </div>
            <div class="flex flex-col justify-around ml-6">
                <p class="text-lg font-bold mb-2">Firstname : {{$user->firstname}}</p>
                <p class="text-lg font-bold mb-2">Lastname : {{$user->lastname}}</p>
                <p class="text-lg font-bold mb-2">Email : {{$user->email}}</p>
                <p class="text-lg font-bold mb-4">Username : {{$user->username}}</p>
                @auth
                    @if(Auth::user()->id == $user->id)
                        <a href="../profile" class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                        Edit Profile
                        </a>
                    @endif
                @endauth
            </div>
        </section>
        <h2 class="p-6 font-bold text-3xl">Collection : </h2>
        <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 m-5">
            @foreach($images as $image)
                @if($image->user_id == $user->id)
                    <div class="relative w-full h-64">
                        <a href="../image/show/{{$image->id}}" class ="absolute inset-0 bg-inherit flex items-center justify-center hover:opacity-70"> <img src="{{ asset($image->image) }}" alt=""class="img_edit object-cover w-full h-full "><span class="absolute inset-0 flex items-center justify-center text-white font-bold text-lg opacity-0 hover:opacity-80">Show</span></a>
                        @auth
                            @if(Auth::user()->id == $image->user_id)
                            <div class="absolute right-0 top-0">
                                <button  class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                    <a href="../image/edit/{{$image->id}}" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                </button>
                                <form action="/image/destroy/{{$image->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class='inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150'>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endauth
                    </div>
                @endif
            @endforeach
        </section>
    </main>

</x-app-layout>