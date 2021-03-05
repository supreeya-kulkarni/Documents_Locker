<?php

namespace App\Http\Controllers;

use App\paymentcard;
use Illuminate\Http\Request;

class PaymentcardController extends Controller
{
    

    public function create(Request $req)
    {
        return view('layouts.add_cards')->with('cardArr', paymentcard::all());
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required',
            'expiration' => 'required|Max:4',
            'cvv' => 'required|Max:3',
            'card_name' => 'required'

        ]);

        $res = new paymentcard;
        $res->card_number = $request->input('card_number');
        $res->expiration = $request->input('expiration');
        $res->cvv = $request->input('cvv');
        $res->card_name = $request->input('card_name');
        $res->save();

        $request->session()->flash('msg', 'Card Details Submitted');
        return redirect('add_cards');
    }

    
    public function edit(paymentcard $paymentcard, Request $request)
    {
        $obj = paymentcard::find($request->id);        
        return view('layouts.edit_cards')->with('cardArr',$obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paymentcard  $paymentcard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, paymentcard $paymentcard)
    {
        $res=paymentcard::find($request->id);
        $res->card_number = $request->input('card_number');
        $res->expiration = $request->input('expiration');
        $res->cvv = $request->input('cvv');
        $res->card_name = $request->input('card_name');
        $res->save();

        $request->session()->flash('msg', 'Card Details Submitted');
        return redirect('add_cards');
    }

    
    public function destroy(paymentcard $paymentcard, $id)
    {
        paymentcard::destroy('id', $id);  
        return redirect('add_cards');   
    }
}
