<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblOwnerDetail';
    protected $fillable =[
        'id',
        'addressId',
        'ownerId'
    ];
}
