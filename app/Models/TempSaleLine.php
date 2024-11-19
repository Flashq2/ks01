<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempSaleLine extends Model
{
    protected $table = 'temp_sales_line';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
}
