<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 問題タイトル表示
    public function index()
    {
        //
        $questions = Question::with('choices')->get();
        // 順番を入れ替えた上で$questionsに渡す？
        // dd($questions);
        return view('admin_question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 新規作成ページの表示
    public function create()
    {
        //
        return view('admin_question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 作成後のレコード一覧画面表示 create->store
    public function store(Request $request)
    {
        //
        $questions = new Question;
        $questions->content=$request->input('content');
        $questions->image=$request->input('image');
        $questions->supplement=$request->input('supplement');

        // dd($questions); 保存の確認

        $questions->save();

        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 問題タイトルに紐づいている選択肢を見る
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 編集画面に飛ぶ
    public function edit($id)
    {
        //
        $questions=Question::find($id);

        // ×show->edit ●index->edit
        return view('admin_question.edit', compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 問題更新画面
    public function update(Request $request, $id)
    {
        //
        $questions=Question::find($id);

        $questions->content=$request->input('content');
        $questions->image=$request->input('image');
        $questions->supplement=$request->input('supplement');
        
        //DBに保存
        $questions->save();

    //処理が終わったらmember/indexにリダイレクト
    return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 問題削除
    public function destroy($id)
    {
        //
        $questions=Question::find($id);

        $questions->delete();
    
        return redirect('questions');
    }
}
