<x-app-layout>

    @if(auth()->user()->hasRole('super_admin'))
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("A SUPERADMIN MINDENT LÁTHAT") }}
                    </div>
                </div>
            </div>
        </div>
    @else
       <div class="container mt-5">
            <div class="alert alert-danger text-center" role="alert">
                <h2>Nem jogosult a taretalom megtekintésére!</h2>
            </div>
        </div>
        @endif
        
    </x-app-layout>

