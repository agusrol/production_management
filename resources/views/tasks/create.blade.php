<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Tarea') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc ps-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <!-- Task Name -->
                    <div class="mb-4">
                        <x-input-label for="nombre" :value="'Task Name'" />
                        <x-text-input id="nombre" class="block w-full mt-1" type="text" name="nombre" required autofocus />
                    </div>

                    <!-- Task Description -->
                    <div class="mb-4">
                        <x-input-label for="descripcion" :value="'Description'" />
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required></textarea>
                    </div>

                    <!-- Assign Employees -->
                    <div class="mb-4">
                        <x-input-label for="employees" :value="'Assign Employees'" />
                        <select name="employees[]" id="employees" multiple required
                            class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Associate Product -->
                    <div class="mb-4">
                        <x-input-label for="product_id" :value="'Product'" />
                        <select name="product_id" id="product_id"
                            class="block w-full mt-1 rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            <option value="">No Product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <x-primary-button>
                            {{ __('Create Task') }}
                        </x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
