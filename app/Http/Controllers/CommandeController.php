<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Car;
use App\Models\User;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes = Commande::all();
        return view('admins.commands',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $car = Car::find($id);
        return view('commands.create')->with('car', $car);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'car_id'=>'required',
        //     'dateL' => 'required',
        //     'dateR'=>'required',
           
        // ]);
        $car=Car::findOrFail($request->car_id);
        $dateLocation=new DateTime($request->dateL);
        $dateRetour=new DateTime($request->dateR);
        $jours=date_diff($dateLocation,$dateRetour);
        $prixTtc=$car->prixJ * $jours ->format('%d');
       
        Commande::create([
            'user_id'=>auth()->user()->id,
            'car_id'=>$request->car_id,
            'dateL'=>$request->dateL,
            'dateR'=>$request->dateR,
            'jours'=> $jours ->format('%d'),
            'prixTTC'=>$prixTtc,
          
        ]);
        // $car->update([
        //     'dispo'=>0,
        // ]);
        return redirect()->route('car.index')->with('success','commande creé avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        $commandes = Commande::find($commande);
        return view('commande.index',compact('commandes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        // dd($commande);
        $commande = Commande::findOrFail($commande->id);
        $car = Car::findOrFail($commande->car_id);
    
        $commande->delete();
    
        $car->update([
            'dispo' => 1,
        ]);
        
        $commande->delete();
        if(auth()->check() && auth()->user()->admin){
            return redirect()->route('command.admin');

        }else{
            return redirect()->route('car.index') ;
        }
        
       
        

    }
    public function acceptCmd(Commande $command){
        $car = Car::findOrFail($command->car_id);
        $command->update([
            'statu' => 'en_coure'
        ]);
        $car->update([
            'dispo'=>0,
        ]);

        return redirect()->route('command.admin');
    }
    public function termineCmd(Commande $command){
        $command->update([
            'statu' => 'termine'
        ]);
        return redirect()->route('command.admin');
    }
}
