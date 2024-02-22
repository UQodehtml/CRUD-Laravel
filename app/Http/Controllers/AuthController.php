<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use Dotenv\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return view("login");
    }

    // Function untuk route login proses agar data untuk masuk ke database
    public function loginproses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect ('/');
        } else {
            return redirect ('/login');
        }
    }
    public function register()
    {
        return view("register");
    }

    // Function untuk route proses agar data untuk masuk ke database
    public function registeruser(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_token'=>Str::random(60),
        ]);
        return redirect('/login'); 
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
    
    // public function login(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         "email" => "required",
    //         "password" => "required",
    //     ]);

    //     $dataLogin = [
    //         'email' => $request->email,
    //         'password' => $request->password
    //     ];

    //     if($validator->fails()){
    //         return redirect()->route("LoginForm")->with("errors", "failed to login");
    //     } else if(Auth::attempt($dataLogin)){
    //         return redirect()->route("AdminLTE");
    //     } else{
    //         return redirect()->route("LoginForm")->with("errors", "failed to login");
    //     }
    // }
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
