<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('list_user', ['users' => $users]);
    }

    public function create()
    {
        return view('ajouter_user');
    }

    public function store(Request $request)
    {
        // valider les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ], [
            'password.confirmed' => 'La confirmation de mot de passe ne correspond pas au mot de passe.',
        ]);

        // créer un nouvel utilisateur
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Nouvel utilisateur créé avec succès.');
    }


    public function edit(User $user)
    {
        return view('modifier_user', ['user' => $user]);
    }

    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $request->filled('name') ? $request->name : $user->name;
    $user->email = $request->filled('email') ? $request->email : $user->email;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('users.index')
        ->with('success', 'Utilisateur mis à jour avec succès.');
}


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

}
