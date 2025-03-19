@extends('layouts.app')

@section('title', 'Task List')

@section('content')
<div class="container">
    <h2>Task List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($tasks->isEmpty())
        <p>No tasks found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Employees</th>
                    <th>Product</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->nombre }}</td>
                    <td>{{ $task->descripcion }}</td>
                    <td>
                        @foreach($task->employees as $employee)
                            {{ $employee->user->name ?? 'No User' }},
                        @endforeach
                    </td>
                    <td>{{ $task->products->first()->nombre ?? 'No Product' }}</td>
                    <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
