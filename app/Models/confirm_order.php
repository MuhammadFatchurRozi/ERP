<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vendor;

class confirm_order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // public function vendors()
    // {
    //     return $this->hasMany(vendor::class);
    // }
    public function vendors()
    {
        return $this->belongsTo(vendor::class, 'id', 'id_vendor');
    }
}
