<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';  // Custom table name

    protected $fillable = ['nombre', 'apellido'];

    
    public function timeEntries(): HasMany //checked 14.03.2025.1207
    {
        return $this->hasMany(TimeEntry::class, 'employee_id');
    }   

    public function tasks(): BelongsToMany //checked 14.03.2025.1214
    {
        return $this->belongsToMany(Task::class, 'employee_task', 'employee_id', 'task_id');
    }
    
    public function user(): BelongsTo  //checked 14.03.2025.1225
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
