<?php

namespace App\Http\Controllers;

use App\Visiteur;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $visiteurs = Visiteur::where('nom', 'LIKE', '%'.$request->r.'%')->get();
        return view('search', [
            'visiteurs' => $visiteurs
        ]);
    }
}
