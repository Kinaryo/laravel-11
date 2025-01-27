<x-layouts>
    <!-- <article>
        <x-slot:title>{{$title}}</x-slot:title>
        <h2 class=" mb-1 text-3xl tracking-tight font-bold text-gray-900">{{$post['title']}}</h2>
        <div class="text-base text-gray-500">
        By
            <a class="hover:underline text-base text-gray-500 " href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> |
            <a href="/categories/{{$post->category->slug}}" class="hover:underline text-base text-gray-500"> {{$post->category->name}}</a> |
            {{ $post->created_at ? $post->created_at->diffForHumans() : 'Waktu tidak tersedia' }}

        </div>
        <p class="my-4 font-light">{{$post['body']}}</p>
        <a class="font-medium text-blue-500 hover:underline" href="/posts/">&laquo; Back To Posts</a>
    </article> -->


    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-blue-600 hover:underline">&laquo; Back to All Post</a>
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
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">Best practices for successful prototypes</h1>
                </header>
                <p class="lead">{{$post->body}}</p>
                </section>
            </article>
        </div>
    </main>






</x-layouts>