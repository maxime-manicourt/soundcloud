<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chanson;
use App\User;
use Validator;

class MonControleur extends Controller
{
    public function index() {

        return view("index", ['chansons' => Chanson::orderBy('id', 'desc')->take(3)->get()]);
    }

    public function utilisateur($id) {
        $utilisateur = User::find($id);

        if($utilisateur==false){
            abort('404');
        }

        return view('utilisateur', ['utilisateur' => $utilisateur]);
    }

    public function suivi($id) {
        $utilisateur = User::find($id);

        if($utilisateur==false){
            return redirect('/')-> with('toastr', ['statut' => 'error', 'message' => 'Erreur']);
        }
    
        Auth::user()->jeLesSuis()->toggle($id);
        return back()->with('toastr', ['statut' => 'success', 'message' => 'Suivi modifié']);
    }

    public function nouvelle(){
        return view('nouvelle');
    }

    public function creer(Request $request){

         $validator = Validator::make($request->all(),[
             'nom' => 'required|min:6'
         ]);

         if ($validator -> fails()){
             return redirect('/nouvelle')
                ->withErrors($validator)
                ->withInput()
                ->with('toastr', ['statut' => 'error', 'message' => 'Erreur']);
         }
       
        if($request->hasFile('chanson') && $request->file('chanson') -> isValid()){
            $c = new Chanson();
            $c -> nom = $request->input('nom');
            $c -> style = $request->input('style');
            $c -> utilisateur_id = Auth::id();

            $c -> fichier = $request -> file('chanson') -> store("/public/chansons/".Auth::id());
            $c -> fichier = str_replace("public/", "/storage/", $c -> fichier);

            $c -> save();

        }

        return redirect("/")->with('toastr', ['statut' => 'success', 'message' => 'Chanson upload !']);
    }

    public function recherche($s){
        $users = User::whereRaw("name LIKE CONCAT(?, '%')", [$s])-> get();
        $chansons = Chanson::whereRaw("nom LIKE CONCAT(?, '%')", [$s])-> get();
        return view("recherche", ['utilisateurs' => $users, 'chansons' => $chansons]);

    }

}
