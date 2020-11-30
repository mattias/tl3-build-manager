<nav x-data="{ open: false }" class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button @click="open = !open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                    x-bind:aria-label="open ? 'Close main menu' : 'Main menu'" aria-label="Main menu"
                    x-bind:aria-expanded="open">
                    <!-- Icon when menu is closed. -->
                    <svg x-state:on="Menu open" x-state:off="Menu closed"
                        :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6"
                        x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- Icon when menu is open. -->
                    <svg x-state:on="Menu open" x-state:off="Menu closed"
                        :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6"
                        x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 text-cool-gray-100">
                    TL3 Build Manager
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex">
                        <a href="{{ route('build') }}"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Build</a>
                        <a href="{{ route('leaderboards') }}"
                            class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Leaderboards</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @if(auth()->check())
                    <x-profile-menu />
                @else
                    <span class="text-white"><a href="/login" class="underline hover:no-underline hover:text-gray-300">Login</a> to create and share builds</span>
                @endif
            </div>
        </div>
    </div>

    <div x-description="Mobile menu, toggle classes based on menu state." x-state:on="Menu open"
        x-state:off="Menu closed" :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="px-2 pt-2 pb-3">
            <a href="{{ route('build') }}"
                class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Build</a>
            <a href="{{ route('leaderboards') }}"
                class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">Leaderboards</a>
        </div>
    </div>
</nav>
