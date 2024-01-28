<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Transaction extends Component
{

    public $amount;

    //    topup method by user logged in
    public function topup($type)
    {
        try {
            DB::beginTransaction();

            //  get wallet
            $wallet = \App\Models\Wallet::where("user_id", auth()->user()->id)->first();

            if ($type == "topup" ){
                // add amount to wallet
                $wallet->update(["amount" => $wallet->amount + $this->amount]);
            }

            if ($type == "withdraw" ){
                // deduct amount from wallet
                $wallet->update(["amount" => $wallet->amount - $this->amount]);
            }

            // reset amount to 0
            $this->amount = 0;

            // dispatch event
            $this->dispatch("wallet");
            DB::commit();
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
        }
    }


    public function render()
    {
        return view('livewire.transaction');
    }
}
