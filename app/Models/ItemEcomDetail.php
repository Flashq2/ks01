<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEcomDetail extends Model
{
    protected $table = 'item_ecom_detail' ;
    protected $primaryKey = 'id';
    use HasFactory;
}
