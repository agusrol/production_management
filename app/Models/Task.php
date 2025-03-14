<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tareas';  // Custom table name

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];

    public function timeEntries(): HasMany {  //checked 14.03.2025.1205
        return $this->hasMany(TimeEntry::class, 'task_id');
    }

    public function employees(): BelongsToMany //checked 14.03.2025.1220
    {
        return $this->belongsToMany(Employee::class, 'employee_task', 'task_id', 'employee_id');
    }

    public function products(): BelongsToMany //checked 14.03.2025.1214
    {
        return $this->belongsToMany(Product::class, 'product_task', 'task_id', 'product_id');
    }
}
