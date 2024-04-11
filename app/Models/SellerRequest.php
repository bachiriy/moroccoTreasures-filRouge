<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SellerRequest extends Model
{
    use HasFactory;
    protected $table = 'seller_requests';
    protected $fillable = ['user_id'];

    function user () {
        return $this->belongsTo(User::class);
    }
}
