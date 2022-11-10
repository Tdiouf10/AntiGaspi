<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceStore;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnnonceController extends Controller
{

    use RegistersUsers;


    

    public function create()
    {
        return view('create');
    }

    public function store(AnnonceStore $request)
    {
        $validated = $request->validated();


        if (!Auth::check()) {
            $request->validate([
                'name' => ['required','unique:users'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'confirmed'],
                'password_confirmation' => ['required']
            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password'])
            ]);

            $this->guard()->login($user);


        }
        $annonce = new Annonce();
        $annonce->title = $validated['title'];
        $annonce->description = $validated['description'];
        $annonce->price = $validated['price'];
        $annonce->localisation = $validated['localisation'];
        $annonce->user_id = auth()->user()->id;
        $annonce->save();

        return redirect()->route('welcome')->with('success', 'Message pour annonce déposer');
    }
}
