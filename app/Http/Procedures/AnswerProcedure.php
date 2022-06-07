<?php

declare(strict_types=1);

namespace App\Http\Procedures;

use App\Http\Resources\AnswerResource;
use App\Http\Resources\AnswerShow;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Sajya\Server\Procedure;

class AnswerProcedure extends Procedure
{
    /**
     * The name of the procedure that will be
     * displayed and taken into account in the search
     *
     * @var string
     */
    public static string $name = 'answers';

    /**
     * Execute the procedure.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return AnswerResource::collection(Answer::all());
    }


    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        $data = $request->all();
        $answer = new Answer();
        $answer->answers = json_encode($data['answers']);
        $answer->form_uid = $data['form_uid'];
        $answer->save();

        return 'success';
    }

    public function show(Request $request)
    {
        $answer = Answer::where('form_uid', '=', $request->input('form_uid'))->first();
//        $test = json_decode($answer->answers);
//        dd($answer->form->name);
        return new AnswerShow($answer);
    }
}
