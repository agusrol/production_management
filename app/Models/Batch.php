<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batches';  // Custom table name

    protected $fillable = ['nro_lote', 'product_id'];

    public function product(): BelongsTo //checked 14.03.2025.1214
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
