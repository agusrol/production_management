<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model
{

    protected $table = 'time_entries'; // Custom table name

    protected $fillable = ['fecha_inicio', 'fecha_fin'];

    public function task() : BelongsTo{
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}
