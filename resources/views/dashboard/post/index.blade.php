<x-layouts>
    <x-slot:title>{{ $title }}</x-slot> <!-- Mengirimkan title ke layout -->
        <div class="flex min-h-screen">
            <!-- Navigasi -->
            <x-sidebar />

            <!-- Konten CRUD Post -->
            <div class="flex-1 bg-gray-200 p-6">
                <div class="max-w-4xl mx-auto">
                    <!-- Tombol Create -->
                    <div class="mb-4">
                        <a href="/mydashboard/posts/create"> 
                            <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                                Tambah Post
                            </button>
                        </a>
                    </div>

                    <!-- Tabel List Post -->
                    <div class="bg-white p-4 rounded shadow">
                        <h2 class="text-xl font-semibold mb-2">List of Posts</h2>
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left w-16">No</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Kategories</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center w-40">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post )
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{$loop->iteration}}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{$post->title}}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{$post->category->name}}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <div class="flex justify-center space-x-1">
                                            <a href="/mydashboard/posts/{{$post->slug}}">
                                                <button class="bg-blue-500 text-white text-sm px-2 py-1 rounded hover:bg-blue-600">Read</button>

                                            </a>
                                            <button class="bg-yellow-500 text-white text-sm px-2 py-1 rounded hover:bg-yellow-600">Edit</button>
                                            <button class="bg-red-500 text-white text-sm px-2 py-1 rounded hover:bg-red-600">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- Tambahkan post lainnya di sini -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</x-layouts>