<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'lotes';  // Custom table name

    protected $fillable = ['nro_lote'];

    public function product(): BelongsTo //checked 14.03.2025.1214
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
