<nav x-data="{ isOpen: false }" class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img class="size-8" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>

            <!-- Move "Login" to the far right -->
            <div class="hidden md:flex ml-auto items-center">
                @guest
                <div class="flex items-center space-x-2">
                    <!-- Link Login dengan pengecekan active -->
                    <x-nav-link href="/login" :active="request()->is('login')" class="text-sm text-gray-500 hover:text-white flex items-center space-x-2">
                        <!-- Ikon dengan ukuran yang disesuaikan -->
                        <ion-icon name="arrow-forward-circle-outline" class="text-gray-500 text-lg"></ion-icon>
                        <!-- Teks Login -->
                        <span>Login</span>
                    </x-nav-link>
                </div>



                @endguest

                @auth
                <!-- Profile Dropdown for Logged In User -->
                <div class="relative ml-3">
                    <div class="flex items-center space-x-4">
                        <!-- Menampilkan nama pengguna dengan setiap kata dimulai dengan huruf besar -->
                        <h4><span class="font-semibold text-white">{{ ucwords(strtolower(auth()->user()->name)) }}</span></h4>

                        <!-- Tombol dengan gambar profil pengguna -->
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative flex items-center justify-center w-10 h-10 rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <!-- Gambar profil pengguna -->
                            <img class="w-8 h-8 rounded-full" src="https://st2.depositphotos.com/3159197/7456/i/950/depositphotos_74567913-stock-photo-3d-white-people-sad.jpg" alt="Profile Picture">
                        </button>
                    </div>





                    <div x-show="isOpen"
                        x-transition:enter="transition ease-out duration-100 transform"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75 transform"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="/mydashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">My Dashboard</a>
                        <form action="{{ url('/logout') }}" method="POST" id="logout-form">
                            @csrf
                            <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">
                                Logout
                            </a>
                        </form>


                    </div>
                </div>
                @endauth
            </div>

            <div class="-mr-2 flex md:hidden">
                <button @click="isOpen = !isOpen" type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/posts" :active="request()->is('posts')">Blog</x-nav-link>
            <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
            <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>

            @guest
            <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
            @endguest

            @auth
            <a href="/profile" class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            <a href="/settings" class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            <a href="/logout" class="block px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            @endauth
        </div>
    </div>
</nav>