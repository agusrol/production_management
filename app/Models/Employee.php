<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';  // Custom table name

    protected $fillable = ['nombre', 'apellido'];

    
    public function timeEntries(): HasMany
    {
        return $this->hasMany(TimeEntry::class, 'employee_id');
    }   

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'employee_task', 'employee_id', 'task_id');
    }
}
