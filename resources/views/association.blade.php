<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- Stampa il nome dell'associazione ricevuto dinamicamente dalla route -->
            {{$name}}            
        </h2>
        <div class="pt-1">
        @switch ($user_type)
        @case(1)
        <span class="border-solid border-2 border-gray-500 text-neutral-800 rounded-md p-0.5">Registered User</span>
        @break
        @case(2)
        <span class="border-solid border-2 border-amber-500 bg-amber-500 text-neutral-50 rounded-md p-0.5">Moderator</span>
        @break
        @case(3)
        <span class="border-solid border-2 border-lime-500 bg-lime-500 text-neutral-50 rounded-md p-0.5">Admin</span>
        @break
        @default
        <span class="border-solid border-2 border-neutral-400 bg-neutral-400 text-neutral-50 rounded-md p-0.5">Visitor</span>
        @break
        @endswitch
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Include il file alert.blade.php per visualizzare i messaggi di successo o di errore --> 
            @include('components.alert')
            
            <div class="bg-white dark:bg-white-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("This is the page of the ".$name." association!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>