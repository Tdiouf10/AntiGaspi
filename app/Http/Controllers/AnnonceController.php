<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnnoncesRequest;
use App\Http\Requests\UpdateAnnonceRequest;
use App\Models\Annonce;
use App\Models\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    use RegistersUsers;


    public function index()
    {
        return view('annonces.index')->with('annonces', Annonce::all());
    }

    public function detail($id)
    {
        $annonce = Annonce::find($id);
        return view('annonces.detail', compact('annonce'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('annonces.create', compact('categories'));
    }

    public function store(CreateAnnoncesRequest $request)
    {
        // enregistrer image

        $newImage = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImage);

        // Creer une annonce

        Annonce::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $newImage,
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
        $key = trim($request->get('q'));
        $annonces = Annonce::query()
            ->where('title', 'LIKE', "%{$key}%")
            ->orWhere('description', 'LIKE', "%{$key}%")
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('annonces.search', compact('annonces'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param Annonce $annonce
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Annonce $annonce)
    {
        $categories = Category::all();
        return view('annonces.create', compact('categories'))->with('annonce', $annonce);
    }

    /**
     * @param UpdateAnnonceRequest $request
     * @param Annonce $annonce
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateAnnonceRequest $request, Annonce $annonce)
    {

        $newImage = time() . '-' . $request->name . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImage);

        $annonce->title = $request->title;
        $annonce->description = $request->description;
        $annonce->image = $newImage;
        $annonce->price = $request->price;
        $annonce->localisation = $request->localisation;
        $annonce->code_postal = $request->code_postal;
        $annonce->user_id = auth()->user()->id;
        $annonce->category_id = $request->category_id;

        $annonce->save();

        session()->flash('success', 'Annonce modifiée');

        return redirect(route('annonces.index'));
    }

    /**
     * @param Annonce $annonce
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();

        session()->flash('success', 'Supprimée');

        return redirect(route('annonces.index'));
    }
}
