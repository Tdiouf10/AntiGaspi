<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceStore;
use App\Models\Annonce;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnnonceController extends Controller
{

    use RegistersUsers;


    public function index()
    {
        $annonces = DB::table('annonces')->orderBy('created_at', 'DESC')->paginate(18);

        return view('annonces', compact('annonces'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(AnnonceStore $request)
    {
        $validated = $request->validated();


        if (!Auth::check()) {
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => ['required', 'confirmed'],
                'firstname' => ['required'],
                'address' => ['required'],
                'code_postal' => ['required'],
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

    public function search(Request $request)
    {
        $words = $request->words;
        $annonces = DB::table('annonces')
            ->where('title', 'LIKE', "%$words%")
            ->orWhere('description', 'LIKE', "%$words%")
            ->orderBy('created_at', 'DESC')
            ->get();

        return response()->json(['success' => true, 'annonces' => $annonces]);
    }
}
