<x-guest-layout>
    <div class="max-w-6xl mx-auto">
    <h1>Products Create</h1>
        <div class="m-2 p-2">
            <a class="px-4 py-3 rounded bg-green-400" href="/products">back</a>
        </div>
    <x-auth-card>
        <x-slot name="logo">
            <h1>
               Create Product
            </h1>
        </x-slot>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('products.store') }}">
        @csrf

            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"  />
            </div>

            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />

                <x-input id="type" class="block mt-1 w-full" type="text" name="type" :value="old('type')" />
            </div>

            <div class="mt-4">
                <x-label for="price" :value="__('Price')" />

                <x-input id="price" class="block mt-1 w-full"
                         type="text"
                         name="price"
                        />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    </div>
</x-guest-layout>
