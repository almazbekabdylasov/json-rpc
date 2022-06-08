<?php

namespace App\Http\Controllers;

use App\Http\Requests\SelectRequest;
use App\Models\Option;
use App\Models\Select;
use Illuminate\Http\Request;

class SelectController extends Controller
{


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
     * @param Request $request
     * @param Select $select
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Select $select)
    {
        $select->name = $request->input('name');
        $select->description = $request->input('description');
        $select->save();
        $select->options()->delete();
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
     * @param Select $select
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Select $select)
    {
        $select->delete();
        return response()->json($select);
    }
}
