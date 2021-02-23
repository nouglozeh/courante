<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use\App\Type_piece;
use App\Type_pieces;

class Type_pieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    { 
        $type_piece = Type_pieces::all();    
       return view('layouts.type_piece.index',['type_piece'=>$type_piece]);
    }

    public function all()
    {
        $type_piece = Type_pieces::all();    
       return view('layouts.type_piece.all',['type_piece'=>$type_piece]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_piece = Type_pieces::all();
        return view('layouts.type_piece.add',compact('type_piece'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

       $type_piece = new Type_pieces();

       $type_piece->libelle=$request->libelle;
       $type_piece->save();

       return redirect("/type_piece");
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
        $type_piece = DB:: table('type_pieces')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.type_piece.edit')->withType_piece($type_piece);
    }

    public function getEdit(Request $request, $id)
    {
        $type_piece = Type_pieces::find($id);
       
        
    return view('layouts.type_piece.edit',['type_piece'=>$type_piece]);
   }   

    public function modifier(Request $request)
    {  
        $type_piece =  Type_pieces::find($request->id);
    
        $type_piece->update($request->all());

        return redirect("/type_piece");
       
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
        $type_piece = Type_pieces::find($id);
    
        $type_piece->update($request->all());

       

       return redirect("/type_piece");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type_pieces::destroy($id);
        return redirect("/type_piece");
    }
}
