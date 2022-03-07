<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intrestrate extends Model
{
    use HasFactory;
    protected $table = 'intrestrate';
    protected $fillable = [
        'userid', 'amount', 'rate', 'time', 'sintrest'
    ];
}
