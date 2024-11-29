<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <br>
                    <a href={{ route('home.index') }}>Home ></a>
                    <br>
                    @can('students.create')
                        <a href={{ route('students.create') }}>Agregar Alumno ></a>
                        <br>
                    @endcan
                    @can('teachers.create')
                        <a href={{ route('teachers.create') }}>Agregar Profesor ></a>
                        <br>
                    @endcan
                    @can('principals.create')
                        <a href={{ route('principals.create') }}>Agregar Directivo ></a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
