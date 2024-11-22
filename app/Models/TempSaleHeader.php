<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempSaleHeader extends Model
{
    protected $table = 'temp_sales_header';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;
}
