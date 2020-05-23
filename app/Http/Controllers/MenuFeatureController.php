<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuFeature;
use App\Http\Resources\MenuFeaturesCollection;

class MenuFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MenuFeaturesCollection(MenuFeature::all());
    }

}
