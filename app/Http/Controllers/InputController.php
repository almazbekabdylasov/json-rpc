<?php

namespace App\Http\Controllers;

use App\Http\Requests\InputRequest;
use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{


    /**
     * @param InputRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    }


    /**
     * @param Request $request
     * @param Input $input
     * @return \Illuminate\Http\JsonResponse
     */
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


    /**
     * @param Input $input
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Input $input)
    {

        $input->delete();
        return response()->json([$input]);
    }
}
