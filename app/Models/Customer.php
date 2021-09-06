<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    
    public function salesrep()
    {
        //return $this;
        return $this->belongsTo('App\Models\Employee','foreign_key');
    }
}
