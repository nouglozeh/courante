<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\VisiteurResource;
use App\Visiteur;
use App\Visite;
use App\Piece;


class visiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $visiteurs = Visiteur::orderByDesc('created_at')->get();
        return view('layouts.visiteur.index',['visiteurs'=>$visiteurs]);
    }

    public function getEdit(Request $request, $id)
    {
        $data = Visiteur::find($id);
        $pis = Piece::find($data->piece_id);
        return view('layouts.visiteur.edit',['data'=>$data,'pis'=>$pis]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.visiteur.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $visiteur = new visiteur();
        $piece =new piece();
        $visite =new visite();
      
        $v = Validator::make($request->all(),[

            'naissance' => ['required', 'date_format:Y-m-d'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'contacte' => ['required'],
            'sexe' => ['required'],
            'email' => ['required','email'],
            'p_nom' => ['required'],
            'nomero' => ['required'],                       
        ]);

        if($v->fails()) return back()->withInput()->withErrors($v->errors());


        $visiteur->nom=$request->nom;
        $visiteur->prenom=$request->prenom;
        $visiteur->naissance=$request->naissance;
        $visiteur->contacte=$request->contacte;
        $visiteur->sexe=$request->sexe;
        $visiteur->email=$request->email;
        $piece->nom=$request->p_nom;
        $piece->nomero=$request->nomero;     
        $piece->save();
      
        $p = DB::table("pieces")
        ->where("updated_at", "=", DB::table("pieces")->max("updated_at"))->get();

        $visiteur->piece_id = $p[0]->id;
        $visiteur->save();
        
        $visite->heure_debut=$request->heure_debut;
        $visite->heure_fin=$request->heure_fin;
        $visite->date=$request->date;
              
        $p = DB::table("visites")
        ->where("updated_at", "=", DB::table("visites")->max("updated_at"))->get();

        return redirect("/visiteur");
      
    }

    /**
     * Display the specified resource.
     * 'start_date' => 'date_format:m/d/Y|after_or_equal:'.$todayDate
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
        $visiteur = DB:: table('Visiteurs')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.visiteur.edit')->withVisiteur($visiteur);
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
       // dd($request->all());

        
        $visiteur = visiteur::find($id);
        dd($visiteur);
        /*$visiteur->nom=$request->nom;
        $visiteur->prenom=$request->prenom;
        $visiteur->naissance=$request->naissance;
        $visiteur->contacte=$request->contacte;
        $visiteur->sexe=$request->sexe;
        $visiteur->email=$request->email;*/
    
        $visiteur->update($request->all());
       


        return redirect("/visiteur");
    }

    public function modifier(Request $request)
    {
        $visiteur = visiteur::find($request->id);
        $piece = Piece::find($visiteur->piece_id);

       // dd($request->all());
    
        $visiteur->update([
            'nom' => $request->nom ? $request->nom : $visiteur->nom,
            'prenom' => $request->prenom ? $request->prenom: $visiteur->prenom,
            'naissance' => $request->naissance ? $request->naissance : $visiteur->naissance,
            'contacte' => $request->contacte ? $request->contacte : $visiteur->contacte,
            'sexe' => $request->sexe ? $request->sexe : $visiteur->sexe,
            'email' => $request->email ? $request->email : $visiteur->email,
           
            
        ]);
        $piece->update([
            'nom' => $request->p_nom ? $request->p_nom : $piece->nom,
            'nomero' => $request->nomero ? $request->nomero : $piece->nomero,

        ]);
        return redirect("/visiteur");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visiteur::destroy($id);
        return redirect("/visiteur");
    }
}
