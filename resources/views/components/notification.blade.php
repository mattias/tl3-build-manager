<div x-data="{open: false, message: ''}" x-show="open" x-on:notify.window="open = true; message = $event.detail; setTimeout(() => open = false, 10000)" class="fixed top-0 right-0">
    <div class="flex m-5">
        <div class="m-auto">
            <div class="bg-white rounded-lg border-gray-300 border p-3 shadow-lg relative">
                <span class="absolute top-0 right-0 mr-5 cursor-pointer" x-on:click="open = false">X</span>
                <div class="flex flex-row">
                    <div class="mx-6">
                        <span x-text="message" class="font-semibold"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
