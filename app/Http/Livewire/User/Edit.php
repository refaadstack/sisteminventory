<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Edit extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $role;

    public function mount($id)
    {
        $user = User::find($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;
    }
    public function render()
    {
        return view('livewire.user.edit')->extends('backend.master.master')->section('content');
    }
    public function update()
    {
        $this->validate([
            'name'      => 'required|min:3',
            'email'     => 'required|email|unique:users,email,'.$this->userId,
            'role'      =>'required',
            'password'  => 'nullable|min:6',
            'password_confirmation' => 'nullable|same:password',
        ]);

        $user = User::find($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = $this->role;
        if($this->password != null){
            $user->password = bcrypt($this->password);
        }
        $user->save();

        session()->flash('message', 'User updated successfully!');

        return redirect()->route('user.index');
    }
}
