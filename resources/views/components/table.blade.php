<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <x-table.row>
                            {{ $head }}
                        </x-table.row>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700" x-max="1">
                        {{ $body }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
