<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Fraud;


class FraudController extends Controller
{
    public function store(Request $request)
    {
        Fraud::create([
            'reason' => $request->reason,
            'email' => $request->email,
            'message' => $request->message,
            'ad_id' => $request->ad_id

        ]);
        return back()->with('message', 'Votre signalement a été enregistré. Merci pour votre retour');
    }

    //for admin section
    public function index()
    {
        $ads = Fraud::paginate(2000);
        return view('backend.fraud.index', compact('ads'));
    }
}
