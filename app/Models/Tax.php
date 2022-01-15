<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblTax';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'name',
        'abbreviation',
        'description',
        'defaultRate',
        'accountId',
        'showInOwners',
        'showInItems'
    ];
}
