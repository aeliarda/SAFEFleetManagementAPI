<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblAddress';
    protected $fillable =[
        'id',
        'addressLine1',
        'addressLine2',
        'cityMunCode',
        'contacts',
        'notes',
        'provinceCode',
        'zipCode'
    ];
}
