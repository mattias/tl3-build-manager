<div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 mt-6">
        <x-table :data="$builds" :headers="$headers"></x-table>
    </div>
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 mt-6 text-white">
        {{ $builds->links() }}
    </div>
</div>
