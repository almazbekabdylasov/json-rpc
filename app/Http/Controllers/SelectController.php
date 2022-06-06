<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectRequest;
use App\Models\Option;
use App\Models\Select;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $select = new Select();
        $select->name = $request->input('name');
        $select->description = $request->input('description');
        $select->form_uid = $request->input('form_uid');
        $select->save();
        foreach ($request->get('options') as $value) {
            $option = new Option();
            $option->value = $value;
            $option->select_id = $select->id;
            $option->form_uid = $request->input('form_uid');
            $option->save();
        }
        return response()->json(
            [
                'select' => view('select.select', compact('select'))->render()
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Select  $select
     * @return \Illuminate\Http\Response
     */
    public function show(Select $select)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Select  $select
     * @return \Illuminate\Http\Response
     */
    public function edit(Select $select)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Select  $select
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Select $select)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Select  $select
     * @return \Illuminate\Http\Response
     */
    public function destroy(Select $select)
    {
        //
    }
}
