<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tareas';  // Custom table name

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];

    public function timeEntries(): HasMany {
        return $this->hasMany(TimeEntry::class, 'task_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'employee_task', 'task_id', 'employee_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_task', 'task_id', 'product_id');
    }
}
