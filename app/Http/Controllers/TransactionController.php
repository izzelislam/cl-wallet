<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("transaction.index");
    }

    /* 
        deposit third party
    */
    public function depositThirdParty()
    {
        try {

            $headers = [
                "Authorization" => "Bearer " . base64_encode(auth()->user()->name),
            ];

            $payload = [
                "order_id" => "123",
                "amount" => 10000.00,
                "timestamp" => Carbon::now(),
            ];

            Http::fake();
            $resposnse = Http::withHeaders( $headers )->post("http://localhost:3000/api/transaction/deposit", $payload);
            
            // check if response status is 1
            if ($resposnse->body()["status"] == 1) {
                $wallet = Wallet::findOrFail( auth()->user()->id );
                $wallet->update([ "balance" => $wallet->balance + $resposnse->body()["amount"] ]);
            }

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}
