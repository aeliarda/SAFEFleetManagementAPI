<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransDetail extends Model
{
    use HasFactory;
    protected $table = 'tblTransDetail';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'transHeaderId',
        'itemId',
        'accountId',
        'quantity',
        'price',
        'amount',
        'genLedgerId',
        'taxId',
        'taxAccountId',
        'taxAmount',
        'totalAmount',
        'taxGenLedgerId'
    ];
    
}
