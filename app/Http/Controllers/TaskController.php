<?php


namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Employee;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;


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
        // Log the request data to see if 'nombre' is missing
        \Log::info('Received Request:', $request->all());
    
        // Validate input
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date',
        ]);
    
        \Log::info('Validated Data:', $validated); // Log validated data
    
        try {
            $task = Task::create([
                'nombre' => $validated['nombre'],  
                'descripcion' => $validated['descripcion'] ?? null,
                'fecha_inicio' => $validated['fecha_inicio'] ?? null,
                'fecha_fin' => $validated['fecha_fin'] ?? null,
            ]);
    
            \Log::info('Task Created:', $task->toArray()); // Log successful insert
    
        } catch (\Exception $e) {
            \Log::error('Error Saving Task: ' . $e->getMessage()); // Log error
            return back()->with('error', 'Task could not be saved.');
        }
    
        return redirect()->route('tasks.create')->with('success', 'Task created successfully.');
    }

    
    public function index()
    {
        // $tasks = Task::with(['employees', 'products'])->get(); // Load related employees and products
        $tasks = Task::all(); // Fetch all tasks
        return view('tasks.index', compact('tasks'));
    }

    public function exportCSV()
    {
        $tasks = Task::with(['employees', 'products'])->get();

        $response = new StreamedResponse(function () use ($tasks) {
            $handle = fopen('php://output', 'w');

            // Agregar encabezados
            fputcsv($handle, ['ID', 'Nombre', 'Descripción', 'Empleados', 'Producto', 'Fecha de Creación']);

            // Agregar datos
            foreach ($tasks as $task) {
                $employees = $task->employees->pluck('user.name')->implode(', ');
                $product = $task->products->first()->nombre ?? 'No Product';

                fputcsv($handle, [
                    $task->id,
                    $task->nombre,
                    $task->descripcion,
                    $employees,
                    $product,
                    $task->created_at->format('Y-m-d H:i')
                ]);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="tasks.csv"');

        return $response;
    }
}
