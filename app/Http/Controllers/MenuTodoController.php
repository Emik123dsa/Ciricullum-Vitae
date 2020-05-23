<?php

namespace App\Http\Controllers;

use App\Models\MenuTodo;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class MenuTodoController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuTodo  $menuTodo
     * @return \Illuminate\Http\Response
     */
    public function show(MenuTodo $menuTodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuTodo  $menuTodo
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->get('todo');

        if (isset($data)) {

            $data_from_features = MenuTodo::query()
            ->where('todo', 'LIKE', '%'.$data.'%')
            ->get();

            return $data_from_features[0];
        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuTodo  $menuTodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuTodo $menuTodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuTodo  $menuTodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuTodo $menuTodo)
    {
        //
    }
}
