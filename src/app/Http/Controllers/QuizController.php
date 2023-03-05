<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuizController extends Controller
{
    //
    public function index()
    {
        //with ('紐付けたい関数名') をつける
        $questions = Question::with('choices')->get();
        //入れたい変数の$無しをcompactする↓
        // dd($questions);
        return view('quiz',compact('questions'));
    }
}
