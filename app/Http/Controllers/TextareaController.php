<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextareaRequest;
use App\Http\Requests\TextareaUpdateRequest;
use App\Models\Textarea;
use Illuminate\Http\Request;

class TextareaController extends Controller
{


    /**
     * @param TextareaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(TextareaRequest $request)
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
     * @param TextareaUpdateRequest $request
     * @param Textarea $textarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(TextareaUpdateRequest $request, Textarea $textarea)
    {
        $textarea->name = $request->input('name');
        $textarea->description = $request->input('description');
        $textarea->save();
        return response()->json(
            [
                'textarea' => view('textarea.textarea', compact('textarea'))->render()
            ], 201);
    }


    /**
     * @param Textarea $textarea
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Textarea $textarea)
    {
        $textarea->delete();
        return response()->json($textarea);
    }
}
