<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Commentaire;

use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $cars = Car::where('prixJ', '<=', 300)->where('type', 'diesel')->get();
        $carsF = Car::where('prixJ', '>', 300)->get();
        $newCars=Car::whereYear('created_at',date('Y'))->get();
        $users=User::all();
        // $comments = Commentaire::whereMonth('created_at', date('m'))->get();
         $comments = Commentaire::all();

        return view('welcome', compact('cars', 'carsF','newCars','users','comments'));
    }
}
