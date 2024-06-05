<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'Payments';
    protected $fillable = ['description', 'date', 'amount','image'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}