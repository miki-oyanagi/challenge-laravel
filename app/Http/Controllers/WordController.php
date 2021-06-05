<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Collections\ItemNotFoundException;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =Word::all();
        return response()->json([
            'message'=>'OK',
            'data'=>$items
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item =new Word;
        $item->todo =$request->todo;
        $item->save();
        return response()->json([
            'message'=>'storeOK',
            'data'=>$item
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function show(Word $word)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Word $word)
    {
        $item =Word::where('id',$word->id)->first();
        $item->todo =$request->todo;
        $item->save();
        if($item){
            return response()->json([
                'data'=>$item,
            ],200);
        }else{
            return response()->json([
                'message'=>'Not found',
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Word  $word
     * @return \Illuminate\Http\Response
     */
    public function destroy(Word $word)
    {
        $item=Word::where('id',$word->id)->delete();
        if($item){
            return response()->json([
                'message'=>$item,
            ],200);
        }else{
            return response()->json([
                'message'=>$item,
            ],404);
        }
    }
}
