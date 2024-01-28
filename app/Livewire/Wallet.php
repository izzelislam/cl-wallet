<?php

namespace App\Livewire;

use Livewire\Component;

class Wallet extends Component
{
    public $wallet;

//    listeners for wallet
    protected $listeners = [
        'wallet' => '$refresh'
    ];
    public function render()
    {
        $this->wallet = auth()->user()->wallet;
        return view('livewire.wallet');
    }
}
