<!-- Profile dropdown -->
<div class="ml-3 relative" x-data="{ open: false }">
    <div>
        <button @click="open = !open"
            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-white transition duration-150 ease-in-out"
            id="user-menu" aria-label="User menu" aria-haspopup="true" x-bind:aria-expanded="open">
            <img class="h-8 w-8 rounded-full" src="{{ Gravatar::get('user@example.com') }}" alt="">
        </button>
    </div>
    <div x-show="open" @mouseleave="open = false"
        x-description="Profile dropdown panel, show/hide based on dropdown state."
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg z-50"
        style="display: none;">
        <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
            aria-labelledby="user-menu">
            <a href="/profile"
                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                role="menuitem">Your Profile</a>
            <a href="/logout"
                class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                role="menuitem">Sign out</a>
        </div>
    </div>
</div>
