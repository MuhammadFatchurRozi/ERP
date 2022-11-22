<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\confirm_order;

class vendor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';

    // public function Confirm_order()
    // {
    //     return $this->belongsTo(confirm_order::class, 'id_vendor');
    // }

    public function confirm_order()
    {
        return $this->hasMany(confirm_order::class, 'id_vendor');
    }
}
