<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="max-w-xl">
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Two Factor Authentication') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Add additional security to your account using two factor authentication.') }}
                </p>
            </header>

            <form method="POST" action="{{ route('bs.verify.update') }}" class="mt-4">
                @csrf
                @method('PUT')

                @if (auth()->user()->two_factor_enabled)
                    <div class="mb-4">
                        <p class="font-medium text-sm text-green-600">
                            {{ __('Two factor authentication is currently enabled.') }}
                        </p>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Disable') }}
                    </button>
                @else
                    <div class="mb-4">
                        <p class="font-medium text-sm text-gray-600">
                            {{ __('Two factor authentication is currently disabled.') }}
                        </p>
                    </div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Enable') }}
                    </button>
                @endif
            </form>
        </section>
    </div>
</div>