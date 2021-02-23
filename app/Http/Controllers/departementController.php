<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Departement;
use App\User;
use App\Visiteur;
use App\Visite;
use App\Rdv;

class departementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $departement = Departement::all();
        return view('layouts.departement.index',['departement'=>$departement,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.departement.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $vts =  Visiteur::where(['departements.id' => $id])
                            ->leftJoin('visites', 'visiteurs.id', 'visites.visiteur_id')
                            ->leftJoin('departements', 'visites.departement_id', 'departements.id')
                            ->get();

        $rdv = Rdv::where(['departements.id'=> $id])   
                             ->leftJoin('visiteurs','rdvs.visiteur_id','visiteurs.id')
                             ->leftJoin('departements','rdvs.departement_id','departements.id')
                             ->get();


        $personnel =  User::find($id);   
                         
        $departement =  Departement::find($id);

        
         
        return view('layouts.departement.show',['departement' => $departement,'visiteurs'=>$vts, 'rdvs'=>$rdv,'personnel'=>$personnel]);
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
