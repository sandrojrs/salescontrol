<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = User::find(Auth::user()->id);
        return view('profile.show', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'nullable',
            'number' => 'nullable|numeric',
            'zip_code' => 'nullable|numeric',
            'phone' => 'nullable',
            'complement' => 'nullable',
            'city' => 'nullable',
            'uf' => 'nullable'
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect()->route('profile.index');
    }
}
