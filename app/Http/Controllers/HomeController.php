<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome')->with('annonces', Annonce::all());
    }

    public function editProfile()
    {
        return view('editProfile')->with('user', \auth()->user());
    }

    public function updateProfile(UpdateProfileRequest $request)
    {

        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'firstname' => $request->firstname,
            'address' => $request->address,
            'code_postal' => $request->code_postal
        ]);


        return back()->with('success', 'Votre profil est mis à jour');

    }
}
