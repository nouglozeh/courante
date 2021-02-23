<?php

namespace App\Http\Controllers;

use App\Departement;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Rdv;
use App\User;
use App\Visiteur;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
       
        if($user->role->id == 2)
        {
            $rdvs = DB::table('rdvs')
            ->join('departements', 'departements.id', '=', 'rdvs.departement_id')
            ->join('visiteurs', 'visiteurs.id', '=', 'rdvs.visiteur_id')
            ->select('rdvs.*', 'departements.name as name', 'departements.nom_dg as nom_dg','visiteurs.nom as nom','visiteurs.prenom as prenom','visiteurs.email as email')
            ->where('user_id', '=', $user->id)
            ->orderByDesc('rdvs.created_at')
            ->get();
        }else{
            $rdvs = DB::table('rdvs')
            ->join('departements', 'departements.id', '=', 'rdvs.departement_id')
            ->join('visiteurs', 'visiteurs.id', '=', 'rdvs.visiteur_id')
            ->select('rdvs.*', 'departements.name as name', 'departements.nom_dg as nom_dg','visiteurs.nom as nom','visiteurs.prenom as prenom','visiteurs.email as email')
            ->orderByDesc('rdvs.created_at')
            ->get();
        }
        return view('layouts.Rdv.index',['rdvs'=>$rdvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $visiteurs = Visiteur::all();
        $users = User::where(['role_id' => 2])->where('departement_id', '!=', null)->get();
        
        return view('layouts.Rdv.add', compact('visiteurs','users'));
    }

    public function getEdit(Request $request, $id)
    {
        $rdvs = Rdv::find($id);
        $data = Visiteur::all();
        $data1 = Departement::all();

        return view('layouts.Rdv.edit',['data'=>$data,'rdvs'=>$rdvs,'data1'=>$data1]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //dd($request->date_prev);
        $todayDate = date('Y-m-d');

        $v = Validator::make($request->all(),[
            'date_prev' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$todayDate],
            'visiteur' => ['required'],
            'user_id' => ['required'],
            'heure_debut_prev' => ['required', 'date_format:H:i'],
            'heure_fin_prev' => ['required', 'date_format:H:i', 'after:heure_debut_prev'],
        ]);

        if($v->fails()) return back()->withInput()->withErrors($v->errors());

        $user = User::find($request->user_id);
        $rdv = new Rdv();
        $rdv->date_prev= $request->date_prev;
        $rdv->heure_debut_prev= $request->heure_debut_prev;
        $rdv->heure_fin_prev= $request->heure_fin_prev;
     
        $request->visiteur ? $rdv->visiteur_id = $request->visiteur : null;
        $user ? $rdv->departement_id = $user->departement_id : null;
        $request->user_client ? $rdv->user_client_id = $request->user_client_id : null;
        $rdv->etat=0;
        $rdv->user_id = $user->id;
     
        $rdv->save();
          
        return redirect("/Rdv");
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
        $rdv = DB:: table('rdvs')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.Rdv.edit')->withRdv($rdv);
    }

    public function modifier(Request $request)
    {
        $rdv = Rdv::find($request->id);
        $visiteur = visiteur::find($rdv->visiteur_id);
        $departement = Departement::find($rdv->departement_id);

        $visiteur->update([
            'nom' => $request->nom ? $request->nom : $visiteur->nom,
            'prenom' => $request->prenom ? $request->prenom: $visiteur->prenom,
        ]);

        $departement->update([
            'name' => $request->name ? $request->name : $departement->name,
        ]);

        $rdv->update([
            'date_prev' => $request->date_prev ? $request->date_prev : $rdv->date_prev,
            'heure_debut_prev' => $request->heure_debut_prev ? $request->heure_debut_prev : $rdv->heure_debut_prev,
            'heure_fin_prev' => $request->heure_fin_prev ? $request->heure_fin_prev : $rdv->heure_fin_prev,
        ]);
      
        return redirect("/Rdv");
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

    }
    public function etat($id)
    {       
        $rdv = Rdv::find($id);
        $visiteur = Visiteur::find($rdv->visiteur->id); 

        if($rdv->etat == 0)
        {
            $rdv->update([
                'etat' => 1    
            ]);
            mail( $visiteur->email,'Votre demande de Rendez-vous à SAASIB SARL',' M./Mm ' . $rdv->visiteur->nom.   '  ' . ' '. $rdv->visiteur->prenom. ' votre Rendez-vous à été enregistré et est prevus pour le ' .$rdv->date_prev. ' de '.$rdv->heure_debut_prev. ' à ' .$rdv->heure_fin_prev .'.'. ' SAASIB SARL vous remercie. Ce message est automatique merci de ne pas repondre ');
        }
        else 
            $rdv->update([
                'etat' => 0
            ]);
            mail( $visiteur->email,'Votre demande de Rendez-vous à SAASIB SARL',' M./Mm '. $rdv->visiteur->nom. '  ' . ' '. $rdv->visiteur->prenom .' votre Rendez-vous à été reposter sur une date ultérieur '.'.'. ' SAASIB SARL vous remerci pour votre comprehention. Ce message est automatique merci de ne pas repondre ');
        return redirect("/Rdv");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rdv::destroy($id); 
        return redirect("/Rdv");
    }
}
