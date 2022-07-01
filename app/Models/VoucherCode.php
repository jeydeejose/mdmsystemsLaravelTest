<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    use HasFactory;

    public $table = 'voucher';

    protected $fillable = [
        'user_id',
        'code',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
