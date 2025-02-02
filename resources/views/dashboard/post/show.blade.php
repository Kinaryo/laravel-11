<x-layouts>
    <x-slot:title>{{ $title }}</x-slot> <!-- Mengirimkan title ke layout -->
        <div class="flex min-h-screen">
            <!-- Navigasi -->
            <x-sidebar />

            <!-- Konten CRUD Post -->
            <div class="flex-1 bg-gray-200 p-6">
                <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
                    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                        <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                            <header class="mb-4 lg:mb-6 not-format">
                                <a href="/mydashboard/posts" class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:bg-green-600 mb-4 inline-block">
                                    &laquo; Kembali
                                </a>


                                <address class="flex items-center mb-6 not-italic">
                                    <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                        <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                                        <div>
                                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{$post->author->name}}</a>
                                            <span class="bg-{{$post->category->color}}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                                <a href="/categories/{{$post->category->slug}}" class="hover:underline">
                                                    {{$post->category->name}}
                                                </a>
                                            </span>
                                            <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at ? $post->created_at->diffForHumans() : 'Waktu tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                </address>
                                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{$post->title}}</h1>
                            </header>
                            <p class="lead">{{$post->body}}</p>
                            </section>
                        </article>
                    </div>
                </main>
            </div>
        </div>

</x-layouts>