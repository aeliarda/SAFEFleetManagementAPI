<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblAccountTypes';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'name',
        'groupId'
    ];
}
