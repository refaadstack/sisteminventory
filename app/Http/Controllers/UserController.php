<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('backend.user.index', compact(['user']));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->barangIn()->delete();

        $user->delete();
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
