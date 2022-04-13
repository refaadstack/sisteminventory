<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Create extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function render()
    {
        return view('livewire.user.create')->extends('backend.master.master')->section('content');
    }
    public function store()
    {
        $this->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users',
            'role'      =>'required',
            'password'  => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'password' => bcrypt($this->password),
        ]);

        session()->flash('message', 'User created successfully!');

        return redirect()->route('user.index');
    }
}
