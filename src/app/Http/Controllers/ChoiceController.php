<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($question_id)
    {
        //
        $choices = Choice::where('question_id',$question_id)->get();
        // dd($choices);
        return view('admin_choice.index',compact('choices','question_id'));
        // editにもquestion_idのパラメータを使える！遷移先で必要か必要でないかでcompactに入れるか決める。
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        // create.blade.php の17行目のidにquestion_idが渡される
        return view('admin_choice.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($question_id,Request $request)
    {
        // urlのパラメータをメソッドの引数で取得する
        //
        $choices = new Choice;
        // $choices->question_id=$request->$question->id;
        $choices->question_id = $question_id;
        $choices->name=$request->input('name');
        $choices->valid=$request->input('valid');
        

        // dd($questions); 保存の確認

        $choices->save();

        return redirect('questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($question_id,$id)
    {
        //
        $choice=Choice::find($id);

        // ×show->edit ●index->edit
        return view('admin_choice.edit', compact('choice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($question_id,$id,Request $request)
    // 先に読み込ませたいパラメータを書いてからRequestを書く
    {
        //
        $choices=Choice::find($id);
        // $choices->question_id=$request->$question->id;
        $choices->name=$request->input('name');
        $choices->valid=$request->input('valid');
        
        //DBに保存
        $choices->save();

    //処理が終わったらmember/indexにリダイレクト
    return redirect('questions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($question_id,$id)
    {
        //
        $choices=Choice::find($id);

        $choices->delete();
    
        return redirect('questions');
    }
}
