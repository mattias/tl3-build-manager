<div>
    <x-table :data="$builds" :headers="$headers"></x-table>

    {{ $builds->links() }}
</div>
