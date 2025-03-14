<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'productos'; 
    
    protected $fillable = ['codigo', 'nombre', 'descripcion'];

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'product_task', 'product_id', 'task_id');
    }

    public function batches(): HasMany
    {
        return $this->hasMany(Batch::class, 'product_id');
    }
}
