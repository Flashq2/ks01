<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsModels extends Model
{
    protected $table = 'items' ;
    protected $primaryKey = 'no';
    public $incrementing = false;
    use HasFactory;
}
