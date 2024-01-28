<?php

namespace App\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class User extends Component
{
    public  $name;
    public  $email;
    public  $password;


    public function mount(){
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function store(){
        try {
            DB::beginTransaction();

            $user = ModelsUser::findOrFail(auth()->user()->id);

            $payload = [
                "name" => $this->name,
                "email" => $this->email,
            ];
            // validate if password not null
            if($this->password){
                $payload["password"] = bcrypt($this->password);
            }

            $user->update($payload);
            DB::commit();
            $this->dispatch('$refresh');

        } catch (\Throwable $e) {
            DB::rollBack();
        }
    }

    public function render()
    {
        return view('livewire.user');
    }
}
