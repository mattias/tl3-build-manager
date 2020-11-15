<div>
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
                    <button wire:click="save"
                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        Save
                    </button>

                    <button
                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        Save As
                    </button>

                    <button wire:click="resetLink"
                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        Reset
                    </button>

                    <button
                        class="p-1 border-2 border-transparent text-gray-400 rounded-full hover:text-white focus:outline-none focus:text-white focus:bg-gray-700 transition duration-150 ease-in-out">
                        Delete
                    </button>

                    <div>
                        <div class="relative rounded-md shadow-sm mr-5 ml-5">
                            <input id="name" wire:model.lazy="name"
                                class="form-input block w-full sm:text-sm sm:leading-5"
                                placeholder="My awesome build name">
                        </div>
                    </div>

                    <!--
                        Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
                        Read the documentation to get started: https://tailwindui.com/documentation
                    -->
                    <!--
                        Custom select controls like this require a considerable amount of JS to implement from scratch. We're planning
                        to build some low-level libraries to make this easier with popular frameworks like React, Vue, and even Alpine.js
                        in the near future, but in the mean time we recommend these reference guides when building your implementation:

                        https://www.w3.org/TR/wai-aria-practices/#Listbox
                        https://www.w3.org/TR/wai-aria-practices/examples/listbox/listbox-collapsible.html
                    -->
                    <div class="space-y-1">
                        <div class="relative">
                            <span class="inline-block w-full rounded-md shadow-sm">
                                <button type="button" aria-haspopup="listbox" aria-expanded="true"
                                    aria-labelledby="listbox-label"
                                    class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    <div class="flex items-center space-x-3">
                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                        <span class="block truncate">
                                            Tom Cook
                                        </span>
                                    </div>
                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none"
                                            stroke="currentColor">
                                            <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </button>
                            </span>

                            <!--
                                Select popover, show/hide based on select state.

                                Entering: ""
                                From: ""
                                To: ""
                                Leaving: "transition ease-in duration-100"
                                From: "opacity-100"
                                To: "opacity-0"
                            -->
                            <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                                <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                    aria-activedescendant="listbox-item-3"
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                                    <!--
                                        Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                                        Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
                                    -->
                                    <li id="listbox-item-0" role="option"
                                        class="text-gray-900 cursor-default select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                                alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                            <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                                            <span class="font-normal block truncate">
                                                Wade Cooper
                                            </span>
                                        </div>

                                        <!--
                                            Checkmark, only display for selected option.

                                            Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                                        -->
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                                            <!-- Heroicon name: check -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </li>

                                    <!-- More options... -->
                                </ul>
                            </div>
                        </div>
                    </div>

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
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
                            style="display: none;">
                            <div class="py-1 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical"
                                aria-labelledby="user-menu">
                                <a href="#"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                    role="menuitem">Your Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"
                                    role="menuitem">Sign out</a>
                            </div>
                        </div>
                    </div>
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

    <div class="bg-gray-900">
        <div class="text-cool-gray-100 max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            Last build: {{ $link }}
        </div>
    </div>

    <iframe id="skill-calculator" class="h-screen w-screen"
        src="{{ $link }}"></iframe>
</div>

<script>
    window.addEventListener('message', (event) => {
        if (event.origin !== "https://tools.torchlightfansite.com")
            return;

        @this.link = event.data;
    }, false);

</script>
