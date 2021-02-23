<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        $id = auth()->id();
        $user = DB::table('users')->where('id',$id)->limit(1)->get();

        $isadmin = ($user[0]->role_id);

        if($isadmin == 4){
            return redirect('/dashboard');
        }elseif($isadmin == 2 ){
            return redirect('/Rdv');
        }
    }
}
