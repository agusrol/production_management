<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if($tasks->isEmpty())
                <p class="text-gray-600">No tasks found.</p>
            @else
                <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                    <table class="min-w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead class="bg-gray-200 dark:bg-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Task Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Employees</th>
                                <th class="px-4 py-2">Product</th>
                                <th class="px-4 py-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $task->id }}</td>
                                <td class="px-4 py-2">{{ $task->nombre }}</td>
                                <td class="px-4 py-2">{{ $task->descripcion }}</td>
                                <td class="px-4 py-2">
                                    @foreach($task->employees as $employee)
                                        {{ $employee->user->name ?? 'No User' }},
                                    @endforeach
                                </td>
                                <td class="px-4 py-2">{{ $task->products->first()->nombre ?? 'No Product' }}</td>
                                <td class="px-4 py-2">{{ $task->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('tasks.csv') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                    Download CSV
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
