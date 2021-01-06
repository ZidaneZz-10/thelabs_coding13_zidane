<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function icon()
    {
        return $this->belongsTo('App\Models\Icon','icon_id');
    }
}
