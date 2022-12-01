<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'max:5'],
            'telephone' => ['required', 'max:10'],
        ]);

        User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
            'address' => $request->address,
            'code_postal' => $request->code_postal,
            'telephone' => $request->telephone,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
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

    public function update(Request $request,User $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'code_postal' => ['required', 'max:5'],
            'telephone' => ['required', 'max:10'],
        ]);

        User::findOrFail($id)->update([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
            'address' => $request->address,
            'code_postal' => $request->code_postal,
            'telephone' => $request->telephone,
        ]);

        session()->flash('success', 'Utilisateur modifié');

        return redirect(route('users.index'));

    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'Utilisateur supprimé');

        return redirect(route('users.index'));
    }
}
