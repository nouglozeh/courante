<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Titre;
use Illuminate\Http\Request;

class TitreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titre = Titre::all();     
        return view('layouts.titre.index',['titre'=>$titre]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    
    {
        $titre = Titre::all();
          
       return view('layouts.titre.add',compact('titre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $titre = new Titre();

       $titre->libelle=$request->libelle;
       $titre->save();
       return redirect("titre");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function show(Titre $titre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $titre = DB:: table('titres')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.titre.edit')->withTitre($titre);
    }
    public function getEdit(Request $request, $id)
    {
        $titre = Titre::find($id);
               
       return view('layouts.titre.edit',['titre'=>$titre]);
    } 

    public function modifier(Request $request)
    {  
        $titre = Titre::find($request->id);
    
        $titre->update($request->all());

        return redirect("/titre");
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $titre = Titre::find($id);
    
        $titre->update($request->all());

        $titre->save();

       return redirect("/titre");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titre  $titre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Titre::destroy($id);
        return redirect("/titre");
    }
}
