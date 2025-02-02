<x-layouts>
    <x-slot:title>{{ $title }}</x-slot> <!-- Mengirimkan title ke layout -->
        <div class="flex min-h-screen">
            <!-- Navigasi -->
            <x-sidebar />

            <!-- Konten CRUD Post -->
            <div class="flex-1 bg-gray-200 p-2">
                <div class="flex-1 bg-gray-200 p-6">
                    <div class="">
                        <a href="/mydashboard/posts" class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:bg-green-600 mb-4 inline-block">
                            &laquo; Kembali
                        </a>
                    </div>

                    <!-- Form with Full Width -->
                    <form action="/posts" method="POST" class="max-w-full mx-auto bg-white p-8 rounded-lg shadow">
                        @csrf

                        <!-- Input Judul -->
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" id="title" name="title" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        </div>

                        <!-- Input Slug -->
                        <div class="mb-4">
                            <input type="text" id="slug" name="slug" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Slug :">

                        </div>

                        <div class="mb-4">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select id="category" name="category_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Trix Editor Input -->
                        <div class="mb-4">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900">Konten Body</label>
                            <input id="body" type="hidden" name="content" value="Editor content goes here">
                            <trix-editor input="body"></trix-editor>
                        </div>

                        <!-- Pilih Kategori -->


                        <!-- Tombol Submit -->
                        <button type="submit" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Add Post
                        </button>
                    </form>
                </div>

            </div>
        </div>

        <script>
            const title = document.querySelector('#title');
            const slug = document.querySelector('#slug');

            title.addEventListener('change', function() {
                fetch('/dashboard/posts/checkSlug?title=' + title.value)
                    .then(response => response.json())
                    .then(data => {
                        // Menambahkan 'Slug : ' di depan slug yang diterima
                        slug.value = 'Slug : ' + data.slug;
                    });
            });
        </script>




</x-layouts>