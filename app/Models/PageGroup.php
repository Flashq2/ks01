<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageGroup extends Model
{
    protected $table = 'page_group';
    protected $primaryKey = 'id';
    public $incrementing = false;
    use HasFactory;
}
