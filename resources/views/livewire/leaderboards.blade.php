<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 space-y-4 mt-4">
    <input type="text" wire:model="search" placeholder="Search build..." class="w-1/4 p-2" />

    <x-table>
        <x-slot name="head">
            @foreach ($headers as $header)
                <x-table.heading>{{ $header }}</x-table.heading>
            @endforeach
        </x-slot>

        <x-slot name="body">
            @foreach ($builds as $build)
                <x-table.row wire:key="build-row-{{ $build->id }}">
                    <x-table.cell>
                        {{ $build->name }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $build->user->name }}
                    </x-table.cell>
                    <x-table.cell>
                        <x-hotbar :hotbar="$build->hotbar()" />
                    </x-table.cell>
                    <x-table.cell>
                        {{ $build->votes }}
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ $build->link }}" class="underline hover:no-underline">Source</a>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    <div class="text-white">
        {{ $builds->links() }}
    </div>
</div>
