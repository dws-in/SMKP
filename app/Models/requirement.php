<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirement extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'number', 'title', 'element_id', 'n0', 'n1', 'n1', 'n2', 'n3'];
}
