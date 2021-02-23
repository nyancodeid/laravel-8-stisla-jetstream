<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $user;
    public $userId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'user.email' => 'required|email|unique:users,email,' . $this->userId
        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'user.name' => 'required|min:3',
            'user.email' => 'required|email|unique:users,email'
        ], $rules);
    }

    public function createUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        $password = $this->user['password'];

        if ( !empty($password) ) {
            $this->user['password'] = Hash::make($password);
        }

        User::create($this->user);

        $this->emit('saved');
        $this->reset('user');
    }

    public function updateUser ()
    {
        $this->resetErrorBag();
        $this->validate();

        User::query()
            ->where('id', $this->userId)
            ->update([
                "name" => $this->user->name,
                "email" => $this->user->email,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->user && $this->userId) {
            $this->user = User::find($this->userId);
        }

        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
