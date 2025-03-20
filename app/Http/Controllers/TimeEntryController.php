<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeEntry;
use App\Models\Task;
use App\Models\Employee;

class TimeEntryController extends Controller
{
    // Mostrar la lista de time_entries
    public function index()
    {
        $timeEntries = TimeEntry::with('task', 'employee')->latest()->get();
        return view('time_entries.index', compact('timeEntries'));
    }

    // Mostrar formulario para crear un time_entry
    public function create()
    {
        $tasks = Task::all();
        $employees = Employee::all();
        return view('time_entries.create', compact('tasks', 'employees'));
    }

    // Guardar el time_entry en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'employee_id' => 'required|exists:employees,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        TimeEntry::create($validated);

        return redirect()->route('time_entries.index')->with('success', 'Time Entry added successfully.');
    }
}
