{{-- resources/views/time_entries/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add Time Entry
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('time_entries.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="user_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">User</label>
                        <select name="user_id" id="user_id" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="project_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Project</label>
                        <select name="project_id" id="project_id" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="hours" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Hours</label>
                        <input type="number" step="0.1" name="hours" id="hours" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div>
                        <label for="date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" name="date" id="date" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
