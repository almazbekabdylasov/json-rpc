<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputRequest;
use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
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


    public function store(InputRequest $request)
    {
        $input = new Input();
        $input->form_uid = $request->input('form_uid');
        $input->name = $request->input('name');
        $input->type = $request->input('type');
        $input->description = $request->input('description');
        $input->save();
        return response()->json(
            [
                'input' => view('input.input', compact('input'))->render()
            ], 201);

//        return response()->json($input);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function show(Input $input)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Input  $input
     * @return \Illuminate\Http\Response
     */
    public function edit(Input $input)
    {
        //
    }


    public function update(Request $request, Input $input)
    {
        $input->name = $request->input('name');
        $input->type = $request->input('type');
        $input->description = $request->input('description');
        $input->save();

        return response()->json(
            [
                'input' => view('input.input', compact('input'))->render()
            ], 201);
    }


    public function destroy(Input $input)
    {

        $input->delete();
        return response()->json([$input]);
    }
}
