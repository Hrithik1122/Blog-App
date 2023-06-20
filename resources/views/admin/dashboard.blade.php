<x-admin-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
            <div class="ml-auto">
                <a href="{{ url('admin/user-list') }}" class="btn btn-primary">User's List</a>
            </div>
            {{-- <a href="{{ url('/dashboard') }}" class="btn btn-primary">Create New Post</a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>All Posts</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User's Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->username }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->description !!}</td>
                                    <td>
                                        {{-- <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                                        <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('admin.delete', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No posts found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
