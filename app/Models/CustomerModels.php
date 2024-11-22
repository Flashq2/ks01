<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModels extends Model
{
    protected $table = 'customer' ;
    protected $primaryKey = 'code';
    public $incrementing = false;
    use HasFactory;
}
