<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nangutang extends Model
{
    protected $table = 'nangutangs';
    protected $fillable = [
        'first_name',
        'last_name',
        'item',
        'quantity',
        'price',
    ];
}
