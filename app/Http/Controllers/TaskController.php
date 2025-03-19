<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        $employees = Employee::with('user')->get(); // Get employees with user info
        $products = Product::all(); // Get all products

        return view('tasks.create', compact('employees', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255', // Use 'nombre' instead of 'name'
            'descripcion' => 'nullable|string', // Match the database column
            'employees' => 'nullable|array',
            'employees.*' => 'exists:employees,id',
            'product_id' => 'nullable|exists:products,id',
        ]);
    
        // Debug: Check what is received
        dd($validated); 
    
        // Create the task with 'nombre' instead of 'name'
        $task = Task::create([
            'nombre' => $validated['nombre'],  
            'descripcion' => $validated['descripcion'] ?? null,
        ]);
    
        // Attach employees if provided
        if (!empty($validated['employees'])) {
            $task->employees()->attach($validated['employees']);
        }
    
        // Attach product if selected
        if (!empty($validated['product_id'])) {
            $task->products()->attach($validated['product_id']);
        }
    
        return redirect()->route('tasks.create')->with('success', 'Tarea creada correctamente.');
    }
    
    public function index()
    {
        $tasks = Task::with(['employees', 'products'])->get(); // Load related employees and products

        return view('tasks.index', compact('tasks'));
    }

}
