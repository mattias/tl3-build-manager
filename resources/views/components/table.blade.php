@props(['data' => []])

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Votes
                            </th>
                            <th class="px-6 py-3 bg-gray-50"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" x-max="1">
                        @if ($data)
                            @foreach ($data as $row)
                                @isset($row['name'])
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">@isset($row['name'])
                                                {{ $row['name'] }} @endisset
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">@isset($row['author'])
                                                {{ $row['author'] }} @endisset
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            @isset($row['description']) {{ $row['description'] }} @endisset
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                            @isset($row['votes']) {{ $row['votes'] }} @endisset
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            @isset($row['link'])<a href="{{ $row['link'] }}"
                                                class="text-indigo-600 hover:text-indigo-900">Link</a>@endisset
                                        </td>
                                    </tr>
                                @endisset
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
