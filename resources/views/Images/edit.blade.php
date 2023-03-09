<x-app-layout>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">            
            <form action="/image/edit/{{$image->id}}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-white shadow-lg rounded px-8 py-6">
            <h1 class="text-4xl font-bold text-center mt-4">Edit</h1>
            @csrf
            @method('PATCH')
            <x-image-input/>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" value="{{$image->title}}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                    <input type="text" name="description" id="description" value="{{$image->description}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <input type="submit" value="Submit">
            </form>
            
        </div>
</x-app-layout>