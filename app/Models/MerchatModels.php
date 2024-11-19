<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchatModels extends Model
{
    protected $table = 'merchant' ;
    protected $primaryKey = 'code';
    public $incrementing = false;
    use HasFactory;
}
