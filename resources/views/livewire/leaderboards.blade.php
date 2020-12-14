<div>
    <x-table>
        <x-slot name="head">
            @foreach ($headers as $row)
                <x-table.heading>{{ $row }}</x-table.heading>
            @endforeach
        </x-slot>

        <x-slot name="body">
            @foreach ($builds as $row)
                <x-table.row wire:key="data-field-id-{{ $row->id }}">
                    <x-table.cell>
                        {{ $row->name }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $row->user->name }}
                    </x-table.cell>
                    <x-table.cell>
                        @livewire('hotbar', ['buildlink' => $row->link], key($row->id))
                    </x-table.cell>
                    <x-table.cell>
                        {{ $row->votes }}
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ $row->link }}" class="underline hover:no-underline">Source</a>
                    </x-table.cell>
                </x-table.row>
            @endforeach
        </x-slot>
    </x-table>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 mt-6 text-white">
        {{ $builds->links() }}
    </div>
</div>
