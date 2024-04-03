<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'product_has_media';
    protected $fillable = ['name', 'product_id'];

    function product()
    {
        $this->belongsTo(Product::class);
    }
}
