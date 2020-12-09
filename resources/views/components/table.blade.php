@props(['data' => [], 'headers' => []])

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            @if ($headers)
                                @foreach($headers as $row)
                                <th
                                    class="px-6 py-3 bg-indigo-800 text-left text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                    {{ $row }}
                                </th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700" x-max="1">
                        @if ($data)
                            @foreach ($data as $row)
                                <tr wire:key="data-field-id-{{ $row->id }}">
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                        @isset($row['name']) {{ $row['name'] }} @endisset
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                        @isset($row['link']) @livewire('hotbar', ['buildlink' => $row['link']]) @endisset
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                        @isset($row['votes']) {{ $row['votes'] }} @endisset
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-white">
                                        @isset($row['link']) <a href="{{ $row['link']}}" class="underline hover:no-underline">Source</a> @endisset
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
