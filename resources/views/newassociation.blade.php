<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Association') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('newassociation.store') }}">
                        @csrf

                        <!-- Association Name -->
                        <div>
                            <x-input-label for="association_name" :value="__('Association Name')" />
                            <x-text-input id="association_name" class="block mt-1 w-full" type="text" name="association_name" :value="old('association_name')" required autofocus autocomplete="association_name" />
                            <x-input-error :messages="$errors->get('association_name')" class="mt-2" />
                        </div>
                
                        <!-- Association Type -->
                        <div class="mt-4">
                            <x-input-label for="association_type" :value="__('Association Type')" />
                            <select id="association_type" name="association_type" class="block mt-1 w-full" required autofocus autocomplete="association_type">
                                @foreach(config('globals.pizza_types') as $key => $value)
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('association_type')" class="mt-2" />
                        </div>

                
                
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Create New') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
