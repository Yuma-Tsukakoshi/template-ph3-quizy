<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{
    //
    public function index()
    {
        $question = Question::with('choices')->get();
        //入れたい変数の$無しをcompactする↓
        return view('quiz',compact('question'));
    }
}
