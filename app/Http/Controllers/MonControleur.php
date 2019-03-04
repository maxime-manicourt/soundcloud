<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chanson;
use App\User;

class MonControleur extends Controller
{
    public function index() {
        

        return view("index", ['chansons' => Chanson::all()]);
    }

    public function utilisateur($id) {
        $utilisateur = User::find($id);

        if($utilisateur==false){
            abort('404');
        }

        return view('utilisateur', ['utilisateur' => $utilisateur]);
    }
}
