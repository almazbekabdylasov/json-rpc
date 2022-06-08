<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequest;
use App\Models\Form;
use Illuminate\Support\Str;

class FormController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $forms = Form::select(['id', 'name'])->get();
        return view('form.index', compact('forms'));
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('form.create');
    }


    /**
     * @param FormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $form = new Form();
        $form->name = $request->input('name');
        $form->form_uid = Str::uuid()->toString();
        $form->save();

        return redirect()->route('form.index');
    }


    /**
     * @param Form $form
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Form $form)
    {
        return  view('form.edit', compact('form'));
    }


    /**
     * @param FormRequest $request
     * @param Form $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FormRequest $request, Form $form)
    {
        $form->name = $request->input('name');
        $form->save();
        return redirect()->route('form.edit', compact('form'));
    }


    /**
     * @param Form $form
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('form.index');
    }
}
