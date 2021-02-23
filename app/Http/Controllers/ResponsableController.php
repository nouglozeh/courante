<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Visiteur;
use App\Rdv;
use App\Respnsable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class responsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rdvs = Rdv::all();
        return view('layouts.responsable.index',['rdvs'=>$rdvs]);
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
        $todayDate = date('Y-m-d');

        $v = Validator::make($request->all(),[
            'date_prev' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$todayDate],
            'visiteur' => ['required'],
            'departement_id' => ['required'],
            'heure_debut_prev' => ['required', 'date_format:H:i'],
            'heure_fin_prev' => ['required', 'date_format:H:i', 'after:heure_debut_prev'],
        ]);

        if($v->fails()) return back()->withInput()->withErrors($v->errors());

        $rdv = new Rdv();
        $rdv->date_prev= $request->date_prev;
        $rdv->heure_debut_prev= $request->heure_debut_prev;
        $rdv->heure_fin_prev= $request->heure_fin_prev;
     
        $request->visiteur ? $rdv->visiteur_id = $request->visiteur : null;
        $request->departement_id ? $rdv->departement_id = $request->departement_id : null;
        $request->user_client ? $rdv->user_client_id = $request->user_client_id : null;
        $rdv->etat=0;
        $rdv->user_id = Auth::user()->id;
     
        $rdv->save();

        return redirect("/responsable");
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
    }
}
