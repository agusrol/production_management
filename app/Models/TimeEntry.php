<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeEntry extends Model
{

    use HasFactory;

    protected $table = 'time_entries'; // Custom table name

    protected $fillable = ['fecha_inicio', 'fecha_fin', 'task_id', 'employee_id'];



    public function task() : BelongsTo{ //checked 14.03.2025.1205
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function employee(): BelongsTo  //checked 14.03.2025.1207
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}
