<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnnoncesRequest;
use App\Models\Annonce;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class AnnonceController extends Controller
{

    use RegistersUsers;


    public function index()
    {
        return view('annonces.index')->with('annonces', Annonce::all());
    }

    public function create()
    {
        $categories = Category::all();
        return view('annonces.create', compact('categories'));
    }

    public function store(CreateAnnoncesRequest $request)
    {
//
//        if (!Auth::check()) {
//            $request->validate([
//                'name' => ['required'],
//                'email' => ['required', 'email', 'unique:users'],
//                'password' => ['required', 'confirmed'],
//                'firstname' => ['required'],
//                'address' => ['required'],
//                'code_postal' => ['required'],
//                'password_confirmation' => ['required'],
//                'telephone' => ['required'],
//            ]);
//
//            $user = User::create([
//                'name' => $request['name'],
//                'email' => $request['email'],
//                'password' => Hash::make($request['password']),
//                'firstname' => $request['firstname'],
//                'address' => $request['address'],
//                'code_postal' => $request['code_postal'],
//                'telephone' => $request['telephone'],
//            ]);
//
//            $this->guard()->login($user);
//        }

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
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
        ]);

        session()->flash('success', 'Success');

        return redirect()->route('annonces.index')->with('success', 'Message pour annonce déposer');
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

//    public function getAnnonces($annonce_id)
//    {
//        $annonces = Annonce::where('id', $annonce_id)->first();
//        if (Auth::user() !== $annonce_id->user_id)
//        {
//
//        }
//    }
}
