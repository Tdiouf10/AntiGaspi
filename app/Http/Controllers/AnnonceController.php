<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceStore;
use App\Http\Requests\CreateAnnoncesRequest;
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
        return view('annonces.index')->with('annonces', Annonce::all());
    }

    public function create()
    {
        return view('annonces.create');
    }

    public function store(CreateAnnoncesRequest $request)
    {
        // enregistrer image

        $image = $request->image->store('annonces');

        // Creer une annonce

        Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'localisation' => $request->localisation,
            'code_postal' => $request->code_postal,
            'user_id' => \auth()->user()->id,
        ]);

        session()->flash('success', 'Success');

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
