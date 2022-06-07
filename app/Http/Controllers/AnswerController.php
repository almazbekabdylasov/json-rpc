<?php

namespace App\Http\Controllers;

use App\Models\Answer;

class AnswerController extends Controller
{
    function index()
    {
        $answers = Answer::paginate(10);
        return view('answers.index', compact('answers'));
    }

}
