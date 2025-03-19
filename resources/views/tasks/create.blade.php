@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Task</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <!-- Task Name -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Task Name</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <!-- Task Description -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Description</label>
            <textarea name="descripcion" class="form-control" rows="3" required></textarea>
        </div>

        <!-- Assign Employees -->
        <div class="mb-3">
            <label for="employees" class="form-label">Assign Employees</label>
            <select name="employees[]" class="form-select" multiple required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Associate Product -->
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" class="form-select">
                <option value="">No Product</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
</div>
@endsection
