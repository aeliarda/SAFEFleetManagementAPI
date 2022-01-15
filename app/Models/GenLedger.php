<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenLedger extends Model
{
    use HasFactory;
    protected $table = 'tblGenLedger';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'transDate',
        'accountId',
        'particular',
        'amtCredit',
        'amtDebit',
        'transHeaderId',
        'transDetailId',
        'runnBalance'
    ];
}
