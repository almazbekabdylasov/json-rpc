<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Models\Form;
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


    public function store(FormRequest $request)
    {
        $form = new Form();
        $form->name = $request->input('name');
        $form->form_uid = Str::uuid()->toString();
        $form->save();

        return redirect()->route('form.index');
    }



    public function edit(Form $form)
    {
        return  view('form.edit', compact('form'));
    }


    public function update(FormRequest $request, Form $form)
    {
        $form->name = $request->input('name');
        $form->save();
        return redirect()->route('form.edit', compact('form'));
    }


    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('form.index');
    }
}
