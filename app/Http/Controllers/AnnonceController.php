<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceStore;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(AnnonceStore $request)
    {
        $validated = $request->validated();

        $annonce = new Annonce();
        $annonce->title = $validated['title'];
        $annonce->description = $validated['description'];
        $annonce->price = $validated['price'];
        $annonce->localisation = $validated['localisation'];
        $annonce->save();

        return redirect()->route('welcome')->with('Message pour annonce déposer');
    }
}
