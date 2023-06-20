<x-admin-layout>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
            <div class="ml-auto">
                <a href="{{ url('admin/dashboard') }}" class="btn btn-primary">Dashboard</a>
            </div>
            {{-- <a href="{{ url('/dashboard') }}" class="btn btn-primary">Create New Post</a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>User List</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>

                                        @if ($user->blocked)
                                         <form action="{{ route('admin.unblock', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <a href="{{ route('admin.unblock', $user->id) }}">
                                            <button type="submit" class="btn btn-primary">Unblock</button>
                                            </a>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.block', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <a href="{{ route('admin.block', $user->id) }}">
                                            <button type="submit" class="btn btn-danger">Block</button>
                                            </a>    
                                        </form>
                                    @endif
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
