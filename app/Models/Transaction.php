<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'Transaction';
    protected $fillable = ['transaction', 'date', 'amount'];
    public $timestamps = false;
}
