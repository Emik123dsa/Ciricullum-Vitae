<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkillCollection;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SkillCollection(Skill::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill(
            array(
            'title' => $request->get('title'),
            'name' => $request->get('name'),
            'about' => $request->get('about'),
            'desc' => $request->get('desc'),
            'color' => $request->get('color')
        )
        );

        $skill->save();

        return response()->json('Add new Skill');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);

        return response()->json($skill);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $skill = Skill::findOrFail($id);

        $skill->update($request->all());

        return response()->json("Updated skill");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $skill = Skill::findOrFail($id);

        $skill->delete();

        return response()->json("Eliminated successfully");
    }
}
