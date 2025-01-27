<x-layouts>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-4 lg:px-0">
        <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($posts as $post)
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center mb-5 text-gray-500">
                    <span class="bg-{{$post->category->color}}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                        <a href="/categories/{{$post->category->slug}}" class="hover:underline">
                            {{$post->category->name}}
                        </a>
                    </span>
                    <span class="text-sm">
                        {{ $post->created_at ? $post->created_at->diffForHumans() : 'Waktu tidak tersedia' }}
                    </span>
                </div>
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <a href="/posts/{{$post->slug}}" class="hover:underline">{{$post['title']}}</a>
                </h2>
                <div class="mb-3">
                    By
                    <a href="/authors/{{$post->author->username}}" class="hover:underline text-base text-gray-500">
                        {{$post->author->name}}
                    </a> |
                    <a href="/categories/{{$post->category->slug}}" class="hover:underline text-base text-gray-500">
                        {{$post->category->name}}
                    </a>
                </div>
                <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                    {{Str::limit($post['body'], 50)}}
                </p>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{$post->author->name}} avatar" />
                        <a href="/authors/{{$post->author->username}}"
                            <span class="font-medium dark:text-white">{{$post->author->name}}</span>
                        </a>
                    </div>
                    <a href="/posts/{{$post->slug}}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                        Read more
                        <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>




</x-layouts>