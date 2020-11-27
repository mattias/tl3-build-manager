<div class="h-screen grid grid-cols-1 place-items-center">
    <div class="bg-white w-full max-w-sm rounded-lg shadow-md overflow-hidden mx-auto">
        <div class="py-4 px-6">
            <h2 class="text-center font-bold text-gray-700 text-3xl">TL3 Build Manager</h2>

            <p class="mt-1 text-center text-gray-500">Create account</p>

            <form wire:submit.prevent="register">
                <div class="mt-4 w-full">
                    <input
                        wire:model="email"
                        class="w-full mt-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded block placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring"
                        type="email" placeholder="Email Address" aria-label="Email Address">
                </div>

                <div class="mt-4 w-full">
                    <input
                        wire:model="password"
                        class="w-full mt-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded block placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring"
                        type="password" placeholder="Password" aria-label="Password">
                </div>

                <div class="mt-4 w-full">
                    <input
                        wire:model="passwordConfirmation"
                        class="w-full mt-2 py-2 px-4 bg-white text-gray-700 border border-gray-300 rounded block placeholder-gray-500 focus:border-blue-500 focus:outline-none focus:ring"
                        type="password" placeholder="Password Confirmation" aria-label="Password Confirmation">
                </div>

                <div class="flex justify-center items-center mt-4">
                    <button class="py-2 px-4 bg-gray-700 text-white rounded hover:bg-gray-600 focus:outline-none"
                        type="button">
                        Register
                    </button>
                </div>
            </form>
        </div>

        <div class="flex items-center justify-center py-4 bg-gray-100 text-center">
            <span class="text-gray-600 text-sm">Already have an account? </span>

            <a href="/login" class="text-blue-600 font-bold mx-2 text-sm hover:text-blue-500">Login</a>
        </div>
    </div>
</div>
