<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblAccounts';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'name',
        'code',
        'acctGroupId',
        'acctTypeId',
        'isDebit',
        'showInBalanceSheet',
        'showInIncomeStatement',
        'showInTrialBalance',
        'beginningBalance'
    ];
    
}
