<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblItems';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'name',
        'description',
        'price',
        'transTypeId',
        'expenseAccountId',
        'incomeAccountId',
        'taxId'
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getDescriptionAttribute($value)
    {
        return is_null($value) || empty($value) ? '' : $value;
    }
    
}
