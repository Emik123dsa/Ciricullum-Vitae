<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuFeature extends Model
{
    protected $fillable = ['name', 'path', 'parent'];
}
