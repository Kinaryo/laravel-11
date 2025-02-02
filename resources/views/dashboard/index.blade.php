<x-layouts>
    <x-slot:title>{{ $title }}</x-slot> <!-- Mengirimkan title ke layout -->
        <div class="flex min-h-screen">
            <!-- Navigasi -->
            <x-sidebar />

            <!-- Konten CRUD Post -->
            <div class="flex-1 bg-gray-200 p-6">
            
            </div>
        </div>

</x-layouts>