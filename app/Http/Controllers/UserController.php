<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        
        // return dd($users);
         return view('admins.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->check() && auth()->user()->admin){
            return view('admins.add_admin');
        }
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'admin'=>$request->admin,
            'ville' => $request->ville,
            'password' => Hash::make($request->password),
        ]);
        auth()->login($user);
        // return dd($user);
        
        return redirect()->route('home', Auth::user()->id);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admins.edit_user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
      
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index');

    }
    public function login()
    {
        return view('users.login');
    }
    public function auth(Request $request)
    {
        $login=$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt($login)){
            $request->session()->regenerate();
            if(auth()->user()->admin){
                return redirect()->route('admin');
            }

            return redirect()->intended();
        }
        // return redirect()->route('login')->with('error','Email ou mot de pass est incorrect');
        return back()->withErrors([
            'email' => 'Email ou mot de pass est incorrect',

        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
