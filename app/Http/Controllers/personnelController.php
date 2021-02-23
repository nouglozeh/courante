<?php

namespace App\Http\Controllers;

use App\Role;
use App\user;
use App\Titre;
use App\Departement;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class personnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnel = User::all();
        $titre = Titre::all();
        $departement =  Departement::all();
        return view('layouts.personnel.index' ,['personnel'=>$personnel,'dpartement'=>$departement]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        //  User::create([
        //     'name' => $data['name'],
        //     'prenom' => $data['prenom'],
        //     'contacte' => $data['contacte'],
        //     'sexe' => $data['sexe'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'role_id' => 1,
        // ]);
        $titre = Titre::all();
        $roles = Role::all();
        $departement = Departement::all();
        $personnel = User::all();
        return view('layouts.personnel.add',compact('titre','personnel', 'roles','departement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd('gh');
        User::create([
            'name' => $request['name'],
            'prenom' => $request['prenom'],
            'contacte' => $request['contacte'],
            'sexe' => $request['sexe'],
            'email' => $request['email'],
            'password' => Hash::make("12345678"), /// 12345678
            'role_id' => $request->role_id,
            'titre_id' => $request->titre_id,
            'departement_id' => $request->departement_id,

        ]);
        
        return redirect("/personnel");
   
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
        $personnel = DB:: table('users')
        ->where('id', '=', $id)
        ->get();
        return view('layouts.personnel.edit')->withPersonnel($personnel);
    }

    public function getEdit(Request $request, $id)
    {
        $personnel = user::find($id);
        $titre = Titre::all(); 
        $roles = Role::all(); 
        $departement = Departement::all();      

    return view('layouts.personnel.edit',['titre'=>$titre,'personnel'=>$personnel,'roles'=>$roles,'departement'=>$departement]);
    } 
    public function modifier(Request $request)
    {  
        $personnel= User::find($request->id);
    
        $personnel->update($request->all());

        return redirect("/personnel");
       
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
        user::destroy($id);
        return redirect("/personnel");
    }
}
