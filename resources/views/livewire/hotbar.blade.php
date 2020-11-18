<div class="flex">
    @foreach ($hotbar as $index => $skill)
        <div class="w-1/9 w-12 h-12 mr-1 flex items-center justify-center">
            <div>
                <span class="text-xs text-center text-white m-1 w-4 h-4 flex items-center justify-center bg-gray-900 rounded-full">{{ $index+1 }}</span>
                <img class="rounded shadow cursor-pointer" src="{{ $skill }}" />
            </div>
        </div>
    @endforeach
</div>
