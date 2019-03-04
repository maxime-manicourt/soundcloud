<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chanson;

class MonControleur extends Controller
{
    public function index() {
        

        return view("index", ['chansons' => Chanson::all()]);
    }
}
