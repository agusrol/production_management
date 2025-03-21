{{-- resources/views/time_entries/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Time Entry
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <form method="POST" action="{{ route('time_entries.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="task_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Task</label>
                        <select name="task_id" id="task_id" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            @foreach ($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="employee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Employee</label>
                        <select name="employee_id" id="employee_id" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                        <input type="datetime-local" name="fecha_inicio" id="fecha_inicio" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label for="fecha_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                        <input type="datetime-local" name="fecha_fin" id="fecha_fin" class="w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
