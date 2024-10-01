<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function index(){
        return view('admins.index');
    }
    public function create(){
        return view('admins.add_admin');
    }
    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
            'ville' => 'required',
            'admin'=>'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'admin'=>$request->admin,
            'ville' => $request->ville,
            'password' => Hash::make($request->password),

        ]);
        
        
        return redirect()->route('admin.index');

        
    }
    public function destroy(Commande $commande)
    {
        dd($commande);
        $commande->delete();
        return redirect()->route('command.admin');
    }
    
}
