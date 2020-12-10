<div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    @foreach ($headers as $row)
                                        <th
                                            class="px-6 py-3 bg-indigo-800 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                            {{ $row }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700" x-max="1">
                                @foreach ($builds as $row)
                                    <tr wire:key="data-field-id-{{ $row->id }}">
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                            {{ $row->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                            {{ $row->user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                            @livewire('hotbar', ['buildlink' => $row->link], key($row->id))
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                           {{ $row->votes }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                            <a href="{{ $row->link }}"
                                                class="underline hover:no-underline">Source</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 mt-6 text-white">
        {{ $builds->links() }}
    </div>
</div>
