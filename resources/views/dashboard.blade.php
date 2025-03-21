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

                    @if(auth()->user()->role === 'admin')
                        <div class="mt-6 flex gap-4">
                            <a href="{{ route('tasks.index') }}"
                               class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold px-4 py-2 rounded transition">
                                Ver Tareas
                            </a>

                            <a href="{{ route('tasks.create') }}"
                               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition">
                                Crear Tarea
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <p>Rol: {{ auth()->user()->role ?? 'no definido' }}</p>
    </div>

</x-app-layout>


