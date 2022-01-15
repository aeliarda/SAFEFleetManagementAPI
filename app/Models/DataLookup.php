<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLookup extends Model
{
    protected $fillable =[
        'id',
        'code',
        'description'
    ];
}
