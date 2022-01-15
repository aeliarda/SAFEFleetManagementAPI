<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransHeader extends Model
{
    use HasFactory;
    protected $table = 'tblTransHeader';
    protected $fillable =[
        'id',
        'createdBy',
        'createdTimeStamp',
        'modifiedBy',
        'modifiedTimeStamp',
        'transTypeId',
        'transDate',
        'invoiceNumber',
        'poNumber',
        'orcrNumber',
        'ownerId',
        'accountId',
        'amount',
        'taxAmount',
        'genLedgerId',
        'wthTaxId',
        'wthTaxAccountId',
        'wthTaxAmount',
        'wthTaxGenLedgerId'
    ];
}
