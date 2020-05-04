<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * We have to determine fillable features for Todo
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'name', 'about', 'desc', 'color'];
}
