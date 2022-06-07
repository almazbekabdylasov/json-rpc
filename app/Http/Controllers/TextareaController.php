<?php

namespace App\Http\Controllers;

use App\Models\Textarea;
use Illuminate\Http\Request;

class TextareaController extends Controller
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
        $textarea = new Textarea();
        $textarea->name = $request->input('name');
        $textarea->description = $request->input('description');
        $textarea->form_uid = $request->input('form_uid');
        $textarea->save();
        return response()->json(
            [
                'textarea' => view('textarea.textarea', compact('textarea'))->render()
            ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Textarea  $textarea
     * @return \Illuminate\Http\Response
     */
    public function show(Textarea $textarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Textarea  $textarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Textarea $textarea)
    {
        //
    }


    public function update(Request $request, Textarea $textarea)
    {
        $textarea->name = $request->input('name');
        $textarea->description = $request->input('description');
        $textarea->save();
        return response()->json(
            [
                'textarea' => view('textarea.textarea', compact('textarea'))->render()
            ], 201);
    }


    public function destroy(Textarea $textarea)
    {
        $textarea->delete();
        return response()->json($textarea);
    }
}
