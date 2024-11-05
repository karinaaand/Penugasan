<div class="flex justify-between items-center p-4">
    <h1 class="text-2xl font-bold">
        {{ $judul ?? 'SIMBAT' }}
    </h1>
    <div class="flex gap-6">
        @if (Request::is('transaction/create'))
            <a href="{{ route('transaction.index') }}" class="bg-bright hover:bg-bright-700 p-2 h-max rounded-xl">
                History

            </a>
        @endif
        <a href="{{ route('transaction.create') }}" class="bg-indigo-300 hover:bg-indigo p-2 h-max rounded-xl">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M2 14V2H0V0H3C3.26522 0 3.51957 0.105357 3.70711 0.292893C3.89464 0.48043 4 0.734784 4 1V13H16.438L18.438 5H6V3H19.72C19.872 3 20.022 3.03466 20.1586 3.10134C20.2952 3.16801 20.4148 3.26495 20.5083 3.38479C20.6019 3.50462 20.6668 3.6442 20.6983 3.79291C20.7298 3.94162 20.7269 4.09555 20.69 4.243L18.19 14.243C18.1358 14.4592 18.011 14.6512 17.8352 14.7883C17.6595 14.9255 17.4429 15 17.22 15H3C2.73478 15 2.48043 14.8946 2.29289 14.7071C2.10536 14.5196 2 14.2652 2 14ZM4 21C3.46957 21 2.96086 20.7893 2.58579 20.4142C2.21071 20.0391 2 19.5304 2 19C2 18.4696 2.21071 17.9609 2.58579 17.5858C2.96086 17.2107 3.46957 17 4 17C4.53043 17 5.03914 17.2107 5.41421 17.5858C5.78929 17.9609 6 18.4696 6 19C6 19.5304 5.78929 20.0391 5.41421 20.4142C5.03914 20.7893 4.53043 21 4 21ZM16 21C15.4696 21 14.9609 20.7893 14.5858 20.4142C14.2107 20.0391 14 19.5304 14 19C14 18.4696 14.2107 17.9609 14.5858 17.5858C14.9609 17.2107 15.4696 17 16 17C16.5304 17 17.0391 17.2107 17.4142 17.5858C17.7893 17.9609 18 18.4696 18 19C18 19.5304 17.7893 20.0391 17.4142 20.4142C17.0391 20.7893 16.5304 21 16 21Z"
                    fill="#262B43" fill-opacity="0.9" />
            </svg>
        </a>
        <div class="relative inline-block text-left">
            <!-- Button to toggle the dropdown -->
            <div>
                <button onclick="toggleDropdown()" class="flex items-center justify-center w-10 h-10 bg-white border-none rounded-full focus:outline-none">
                    <img src="{{ asset('assets/avatar.jpg') }}" alt="Avatar" style="width: 40px; height: 40px; margin-right: 3px; vertical-align: middle; display: inline-block;">
                    <path d="M10 10a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm0 2c-3.333 0-10 1.667-10 5v1h20v-1c0-3.333-6.667-5-10-5z"/>
                    </svg>
                </button>
            </div>

            <!-- Dropdown content -->
            <div id="dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-72 h-64 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-4 flex flex-col items-ce">
                    <!-- Profile Image and Green Dot -->
                    <div class="relative w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-7">
                        <img src="{{ asset('assets/avatar.jpg') }}" alt="Avatar"class="rounded-full w-full h-full">
                        <span class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 rounded-full border-2 border-white"></span>
                    </div>


                    <!-- User Info -->
                    <div class="mt-4 w-full px-6">
                        <div class="flex items-center text-sm text-gray-600 font-semibold mb-2">
                            <span class="w-24">Username</span><span>:</span>
                            <span class="ml-2">ADMIN123</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 font-semibold mb-2">
                            <span class="w-24">Role</span><span>:</span>
                            <span class="ml-2">ADMIN</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 font-semibold mb-4">
                            <span class="w-24">Email</span><span>:</span>
                            <span class="ml-2">ADMIN@gmail.com</span>
                        </div>
                    </div>

                    <!-- Logout Button with Top Margin -->
                    <div class="mt-1 w-full flex justify-center">
                        <a href=""{{ route('user.logout') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg flex items-center justify-center w-4/5">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Log Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }
</script>

