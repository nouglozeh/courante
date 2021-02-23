<?php

namespace App\Http\Controllers;

use App\Rdv;
use App\Visiteur;
use App\Dossier;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $visite=DB::table('visites')->get()
        ->count();

        $visiteur = Visiteur::all()->count();

        $rdv = Rdv::all()->count();

        $dossier= Dossier::all()->count();

        
        $nbVisite = DB::select('
        SELECT DATE_FORMAT(date, "%Y") as annee, DATE_FORMAT(date, "%M") as mois, COUNT(*) as nombre
        FROM visites
        GROUP BY annee, mois
        HAVING annee = ?;
            ', ["2020"]);
        

        return view('layouts.dashboard.index',[
            'visite' => $visite,
            'visiteur' => $visiteur,
            'rdv' => $rdv,
            'dossier' => $dossier,
            'nbVisite' => $nbVisite
        ]);
       
    }

    public function nbVisite()
    {
        $data = DB::select('
            SELECT DATE_FORMAT(date, "%Y") as annee, DATE_FORMAT(date, "%M") as mois, COUNT(*) as nombre
            FROM visites
            GROUP BY annee, mois
            HAVING annee = ?;
            ', ["2020"]);      
        return response()->json($data,200);
    }


    public function nbRdv()
    {
        $data = DB::select('
        SELECT DATE_FORMAT(date_prev, "%Y") as annee, DATE_FORMAT(date_prev, "%M") as mois, COUNT(*) as nombre
        FROM rdvs
        GROUP BY annee, mois
        HAVING annee = ?;
        ', ["2020"]);  

        return response()->json($data,200);
    }

    
    public function nbDossier()
    {
        $data = DB::select('
        SELECT DATE_FORMAT(date, "%Y") as annee, DATE_FORMAT(date, "%M") as mois, COUNT(*) as nombre
        FROM dossiers
        GROUP BY annee, mois
        HAVING annee = ?;
        ', ["2020"]);  

        return response()->json($data,200);
    }

    public function nbVisiteur()
    {
        $data = DB::select('
        SELECT DATE_FORMAT(created_at, "%Y") as annee, DATE_FORMAT(created_at, "%M") as mois, COUNT(*) as nombre
        FROM visiteurs
        GROUP BY annee, mois
        HAVING annee = ?;
        ', ["2020"]);

        return response()->json($data,200);
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
