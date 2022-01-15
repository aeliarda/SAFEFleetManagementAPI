<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblOwners';
    protected $fillable =[
        'id',
        'name',
        'phoneNumber',
        'email',
        'taxIdNumber',
        'firstName',
        'lastName',
        'ownerTypeId',
        'wthTaxId',
        'wthTaxRate'
    ];
}
