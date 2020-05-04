<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCards extends Model
{
    /**
     * Fillable skills detected
     *
     * @var array
     */
    protected $fillable = ['id', 'icon', 'name', 'img', 'color', 'link', 'parent'];
}
