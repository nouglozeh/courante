<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Visite;
use App\Visiteur;
use App\Departement;
use App\Piece;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class visiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $visite = Visite::orderByDesc('created_at')->get();
        return view('layouts.visite.index',['visites'=>$visite]);
    }

    public function getEdit(Request $request, $id)
    {
        $visite = Visite::find($id);
        $visiteur = Visiteur::all();
        $departement = Departement::all();
        $piece =Piece::all();
        $user =  User::where("users.titre_id","!=",1)->where("users.titre_id","!=",2)->where("users.titre_id","!=",4)
                            ->leftJoin('titres','users.titre_id','titres.id')
                            ->select('users.*')
                            ->get();
        return view('layouts.visite.edit',['user'=>$user,'visite'=>$visite,'visiteur'=>$visiteur,'departements'=>$departement,'piece'=>$piece]);
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     }
    public function create()
    {
        $departement =  Departement::all();
        $visiteurs =  Visiteur::all();
        $user =  User::where("users.titre_id","!=",1)->where("users.titre_id","!=",2)->where("users.titre_id","!=",4)
                            ->leftJoin('titres','users.titre_id','titres.id')
                            ->select('users.*')
                            ->get();
        //dd($user);
        return view('layouts.visite.add',['user'=>$user,'visiteurs'=>$visiteurs,'departements'=>$departement]);
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
            //'date' => ['required', 'date_format:Y-m-d', 'after_or_equal:'.$todayDate],          
            'objet' => ['required'],
            'departement' => ['required'],
            //'utilisateur' => ['required'],
            'email' => ['required', 'unique:users'],
            'heure_debut' => ['required', 'date_format:H:i'],
            'heure_fin' => ['required', 'date_format:H:i', 'after:heure_debut'],
        ]);

        if($v->fails()) return back()->withInput()->withErrors($v->errors()); 
             
        $visite = new visite();
        $visiteur = new visiteur();
        $user = new user();
        $piece = new Piece();
        $departement = new Departement();

        //dd($request->user);

        if($request->id == null){
            
                $piece->nom=$request->p_nom;
                $piece->nomero=$request->nomero;
                $piece->save();

                $visiteur->piece_id=$piece->id;

                $visiteur->nom=$request->nom;
                $visiteur->sexe=$request->sexe;
                $visiteur->prenom=$request->prenom;
                $visiteur->email=$request->email;
                $visite->date = date('Y-m-d H:i', strtotime(now()));

                $visiteur->save();
                
                $visite->visiteur_id=$visiteur->id;
                $visite->prsonnelvi=$request->user ? $request->user : null;
                $visite->heure_debut=$request->heure_debut;
                $visite->heure_fin=$request->heure_fin;
                $visite->objet=$request->objet;
                $visite->stat=1;
                $request->visiteur ? $visite->visiteur_id = $request->visiteur : null;
                $request->departement ? $visite->departement_id = $request->departement : null;
                $visite->user_id = Auth::user()->id;
                $visite->save();
            }
        else
            {
                $visite->visiteur_id=$request->id;

                $visite->prsonnelvi=$request->user ? $request->user : null;
                $visite->heure_debut=$request->heure_debut;
                $visite->heure_fin=$request->heure_fin;
                $visite->date = date('Y-m-d H:i', strtotime(now()));
                $visite->objet=$request->objet;
                $visite->stat=1;
                $request->visiteur ? $visite->visiteur_id = $request->visiteur : null;
                $request->departement ? $visite->departement_id = $request->departement : null;
                $visite->user_id = Auth::user()->id;
                $visite->save();
           } 
           if($request->objet =='Demande de rendez-vous'){
            return redirect("/Rdv");
           }

          else if($request->objet =='Dépot de dossier'){
            return redirect("/dossier");
          }
            return redirect("/visite");
   
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visite = DB:: table('Visites')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.visite.edit')->withVisite($visite);
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

    public function modifier(Request $request)
    {  

        if(isset($request->heure_fin) && isset($request->heure_debut))
        {
            //dd($request->heure_fin);
            $date = date('H:i', strtotime($request->heure_debut));
            $v = Validator::make($request->all(),[
                'heure_debut' => ['required', 'date_format:H:i'],
                'heure_fin' => ['required', 'date_format:H:i', 'after:'.$date],
            ]);
            if($v->fails()) return back()->withInput()->withErrors($v->errors());
        }
        
        
        
        
        $visite = visite::find($request->id);
        $visiteur = visiteur::find($visite->visiteur_id);
        $piece = piece::find($visiteur->piece_id);
        $departement = Departement::find($visite->departement_id);

        
        //   dd($request->all());
        $visiteur->update([

            'nom' => $request->nom ? $request->nom : $visiteur->nom,
            'prenom' => $request->prenom ? $request->prenom: $visiteur->prenom,
            'contacte' => $request->contacte ? $request->contacte : $visiteur->contacte,
            'sexe' => $request->sexe ? $request->sexe : $visiteur->sexe,
            'email' => $request->email ? $request->email: $visiteur->email,
        ]);

        $visite->update([
            'prsonnelvi' => $request->user ? $request->user : null,
            'heure_debut' => $request->heure_debut ? $request->heure_debut: $visite->heure_debut,
            'heure_fin' => $request->heure_fin ? $request->heure_fin : $visite->heure_fin,
            'date' => $request->date ? $request->date:$request->date,
            'objet' => $request->objet ? $request->objet:$request->objet,
            'departement_id' => $request->departement? $request->departement : $visite->departement_id,
            'stat' => $request->stat=1,
        ]);
        $piece->update([
            'nom' => $request->p_nom ? $request->p_nom : $piece->nom,
            'nomero' => $request->nomero ? $request->nomero : $piece->nomero,
        ]);

       
        return redirect("/visite");
    }

    /**
     * Remove the specified resource from storage.
     *  'start_date' => 'date_format:m/d/Y|after_or_equal:'.$todayDate
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visite::destroy($id);
        return redirect("/visite");
    }
}
