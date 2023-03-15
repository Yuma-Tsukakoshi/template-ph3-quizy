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
    public function index()
    {
        //
        $choices = Choice::all();
        // dd($choices);
        return view('admin_choice.index',compact('choices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin_choice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $choices = new Choice;
        // $choices->question_id=$request->$question->id;
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
    public function edit($id)
    {
        //
        $choices=Choice::find($id);
        // id があやふや

        // ×show->edit ●index->edit
        return view('admin_choice.edit', compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        //
        $choices=Choice::find($id);

        $choices->delete();
    
        return redirect('questions');
    }
}
