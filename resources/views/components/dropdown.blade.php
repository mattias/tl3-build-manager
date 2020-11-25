@props(['options', 'selected'])

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
<div class="space-y-1" x-data="{ open: false, selected: @entangle('selected') }">
    <div class="relative">
        <span class="inline-block w-64 rounded-md shadow-sm">
            <button @click="open = true" type="button" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                <div class="flex items-center space-x-3">
                    <span class="block truncate">
                        @if( !empty($selected) )
                        {{ $selected['name'] }}
                        @endif
                    </span>
                </div>
                <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                        <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
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
        <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg" x-show="open" @click.away="open = false">
            <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                <!--
                    Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                    Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
                -->
                @foreach($options as $option)
                <li wire:click="select('{{ $option['name'] }}')"
                    id="listbox-item-0" role="option"
                    class="text-gray-900 cursor-default select-none relative py-2 px-1 cursor-pointer hover:text-gray-400">
                    <div class="flex items-center space-x-3">
                        <!-- Selected: "font-semibold", Not Selected: "font-normal" -->
                        <span class="font-normal block truncate">
                            {{ $option['name'] }}
                        </span>
                    </div>

                    @if($option['name'] === $selected['name'])
                        <!--
                            Checkmark, only display for selected option.

                            Highlighted: "text-white", Not Highlighted: "text-indigo-600"
                        -->
                        <span class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <!-- Heroicon name: check -->
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @endif
                </li>
                @endforeach

                <!-- More options... -->
            </ul>
        </div>
    </div>
</div>
