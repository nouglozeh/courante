<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function show(Piece $piece)
    {
        //
    }

    public function getEdit(Request $request, $id)
    {
        $data =  Piece::find($id);
        return view('layouts.piece.edit',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $piece = DB:: table('pieces')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.piece.edit')->withpiece($piece);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $piece = Piece::find($id);
        $piece->update($request->all());

        return redirect("/piece");    }

    public function modifier(Request $request)
    {
        $piece = piece::find($request->id);
    
        $piece->update($request->all());

        $id = $piece->dossier ? $piece->dossier->id : 0;

        return redirect("/dossier/".$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piece  $piece
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Piece::destroy($id);
        return redirect("/piece");
    }
}
