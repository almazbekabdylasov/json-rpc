<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Http\Resources\AnswerResource;
use App\Http\Resources\FormResource;
use App\Http\Resources\FormsResource;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Sajya\Server\Procedure;

class FormsProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'forms';

    /**
     * Execute the procedure.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return FormsResource::collection(Form::all());
    }

    /**
     * Execute the procedure.
     *
     * @param Request $request
     * @return FormResource
     */
    public function show(Request $request): FormResource
    {
        $form = Form::where('form_uid', '=', $request->input('form_uid'))->first();
        return new FormResource($form);
    }


    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function answers(Request $request): AnonymousResourceCollection
    {
        $form = Form::findOrFail($request->get('form_id'));
        return  AnswerResource::collection($form->answers);
    }
}
