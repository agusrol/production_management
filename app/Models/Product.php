<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['codigo', 'nombre', 'descripcion'];

    public function tasks(): BelongsToMany //checked 14.03.2025.1226
    {
        return $this->belongsToMany(Task::class, 'product_task', 'product_id', 'task_id');
    }

    public function batches(): HasMany //checked 14.03.2025.1215
    {
        return $this->hasMany(Batch::class, 'product_id');
    }
}
