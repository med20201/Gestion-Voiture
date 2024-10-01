<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->search !== null){
            $search=$request->search;
            $cars = Car::where('marque', 'like', '%'.$search.'%')->inRandomOrder()->Paginate(6);
                return view('cars.index', compact('cars'));
        }else{
            $cars = Car::inRandomOrder()->Paginate(6);
                 return view('cars.index', compact('cars'));
        }
        


        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {
      
        $file=$request->image;
        $path= $file?->store("photoCar");
       
        // if(isset($request->image)){
        // $image = time().'.'.$request->image->extension();
        // $request->image->storeAs('photoCar', $image);
        // }
        Car::create([
            'marque' => $request->marque,
            'model' => $request->model,
            'type' => $request->type,
            'prixJ' => $request->prixJ,
            'vitesse' => $request->vitesse,
            'image' => $path
        ]);
        
        return redirect()->route('car.admin')->with("success", "L'ajoute de Voiture a bien réussi!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admins.edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarRequest $request, Car $car)

    {
       
       
        $data=$request->all();
        if($request->has('image')){
            $file=$request->image;
            $path= $file?->store("photoCar");
            $data["image"]=$path;
        }else{
            $data["image"]=$car->image;
        }

        $car->update($data);
          return redirect()->route('car.admin')->with("success", "La modification de Voiture a bien réussi!");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('car.admin');
    }
    public function carAdmin(){
        $cars = Car::all();
        return view('admins.cars', compact('cars'));
    }

    public function carType($type)
    { 
        // return dd($type);
        $cars = Car::where('type', $type)->Paginate(6);
        return view('cars.index', compact('cars'));
    }

    // public function carDiesel()
    // {
    //     $cars = Car::where('type', 'diesel')->get();
    //     return view('cars.carDiesel', compact('cars'));
    // }
    // public function carEssence()
    // {
    //     $cars = Car::where('type', 'essence')->get();
    //     return view('cars.carDiesel', compact('cars'));
    // }
    public function carVitesse($vitesse)
    {
        $cars = Car::where('vitesse', $vitesse)->Paginate(6);
        return view('cars.index', compact('cars'));
    }
//     public function carManu()
//     {
//         $cars = Car::where('vitesse', 'manuelle')->get();
//         return view('cars.carDiesel', compact('cars'));
//     }
}
