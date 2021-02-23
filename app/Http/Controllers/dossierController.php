<?php
namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Dossier;
use App\Piece;
use App\Type_pieces;
use App\Visiteur;
class dossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Dossier::all();
        return view('layouts.dossier.index',['dossiers'=>$dossiers]);
    }

    public function getEdit(Request $request, $id)
    {
        $data =  Dossier::find($id);
        $visiteurs = Visiteur::all();
        return view('layouts.dossier.edit',['data'=>$data,'visiteurs'=>$visiteurs]);
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $visiteurs =  Visiteur::all();
        $type_pieces = Type_pieces::all();
        return view('layouts.dossier.add',['visiteurs'=>$visiteurs,'type_pieces'=>$type_pieces]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       

        // $v = Validator::make($request->all(),[
        //     'nom' => ['required'],
        //     'dossier_id' => ['required'],
        // ]);

        // if($v->fails()) return back()->withInput()->withErrors($v->errors());


        $dossier = new Dossier();
        $dossier->nom=$request->nom;
        $dossier->nombre = $request->nombrepiece;

        DB::beginTransaction();
            $dossier->save();
            
            Visiteur::find($request->visiteur)->update([
                'dossier_id' => $dossier->id
            ]);
            for($i = 0; $i < $request->nombrepiece; $i++)
            {
                $piece = new Piece();
                $piece->nom = $request->nompiece[$i];
                $piece->dossier_id = $dossier->id;
                $piece->save();
            }
        DB::commit();
        return redirect("/dossier");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossier =  Dossier::find($id);
        return view('layouts.dossier.show', ['dossier' => $dossier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossier = DB:: table('dossiers')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.dossier.edit')->withdossier($dossier);
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
        $dossier = dossier::find($id);
        $dossier->update($request->all());

        return redirect("/dossier");
    }
    
    public function modifier(Request $request)
    {
        $dossier = Dossier::find($request->id);
         
        $dossier->update([
            'nom' => $request->nom ? $request->nom : $dossier->nom,
            'date' => $request->date ? $request->date: $dossier->date,
            'nombre' =>  $dossier->nombre + count($request->nompiece),             
        ]);
        Visiteur::find($dossier->visiteurs[0]->id)->update([
            'dossier_id' => null
        ]);

        Visiteur::find($request->visiteur)->update([
            'dossier_id' => $dossier->id
        ]);
        for($i = 0; $i < count($request->nompiece); $i++)
        {
            $piece = new Piece();
            $piece->nom = $request->nompiece[$i];
            $piece->dossier_id = $dossier->id;
            $piece->save();
        }
        return redirect("/dossier");
    }
    public function getPostPdf ($id)
    {
        $dossier =  Dossier::find($id);
        // L'instance PDF avec la vue resources/views/posts/show.blade.php
        $pdf = PDF::loadView("layouts.dossier.pdf",['dossier' => $dossier]);
        // Lancement du téléchargement du fichier PDF
        $pdf->download("dossier.pdf"); 
        return $pdf->stream();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dossier::destroy($id);
        return redirect("/dossier");
    }
}
