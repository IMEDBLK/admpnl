<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
    public function index()
{
    return view('welcome.index');
}

public function editProfile()
{
    $user = Auth::user(); // récupère l'utilisateur connecté

    return view('profil', compact('user'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        'password' => 'nullable|min:8|confirmed|different:current_password',
        'current_password' => [
            'required_with:password',
            function ($attribute, $value, $fail) use ($user, $request) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Le mot de passe actuel est incorrect.');
                }
            }
        ],
    ]);


    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
}


}
