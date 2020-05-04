<?php

namespace App\Http\Controllers;
use App\Http\Resources\SkillCardsCollection;
use App\Models\SkillCards;

use Illuminate\Http\Request;

class SkillCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        return new SkillCardsCollection(SkillCards::all());
    }
}
