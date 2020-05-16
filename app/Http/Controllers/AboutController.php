<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

use App\Http\Resources\AboutCollection;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new AboutCollection(About::all());
    }
}
