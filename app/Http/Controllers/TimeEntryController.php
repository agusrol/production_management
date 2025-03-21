<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeEntry;
use App\Models\Task;
use App\Models\Employee;

class TimeEntryController extends Controller
{
        public function index()
    {
        if (!in_array(auth()->user()->role, ['user', 'admin'])) {
            abort(403);
        }

        $entries = TimeEntry::with(['task', 'employee'])->latest()->get();

        return view('time_entries.index', compact('entries'));
    }

    public function create()
    {
        if (!in_array(auth()->user()->role, ['user', 'admin'])) {
            abort(403);
        }

        $tasks = Task::all();
        $employees = Employee::all();

        return view('time_entries.create', compact('tasks', 'employees'));
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['user', 'admin'])) {
            abort(403);
        }

        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'employee_id' => 'required|exists:employees,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        TimeEntry::create([
            'task_id' => $request->task_id,
            'employee_id' => $request->employee_id,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('time_entries.create')->with('success', 'Time entry created.');
    }
}
