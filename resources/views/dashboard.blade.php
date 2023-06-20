<x-app-layout>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="ml-auto">
            <a href="{{ url('/my-posts') }}" class="btn btn-primary">My Posts</a>
        </div> --}}
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
            <div class="ml-auto">
                <a href="{{ url('/my-posts') }}" class="btn btn-primary">My Posts</a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Create Post</h2>
                <form action="{{route ('store') }}" method="POST">
                        @csrf
                    <div class="form-group">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <label for="name">Title <span style="color: red">*</span></label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title here..." required>
                    </div><br>

                    <div class="form-group">
                        <label for="Description">Description <span style="color: red">*</span></label>
                        <textarea name="description" id="editor" class="form-control" placeholder="Enter Description here..." ></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Publish</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-app-layout>
