<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::select(['id', 'name'])->get();
        return view('form.index', compact('forms'));
    }


    public function create()
    {
        return view('form.create');
    }


    public function store(Request $request)
    {
        $form = new Form();
        $form->name = $request->input('name');
        $form->form_uid = Str::uuid()->toString();
        $form->save();

        return redirect()->route('form.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }


    public function edit(Form $form)
    {
        return  view('form.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
