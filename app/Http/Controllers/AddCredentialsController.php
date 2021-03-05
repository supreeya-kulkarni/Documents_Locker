<?php

namespace App\Http\Controllers;

use App\AddCredentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Crypt;

class AddCredentialsController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        return view('layouts.add_credentials')->with('credArr', AddCredentials::all());
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'domain_name' => 'required',
            'url' => 'required|Max:200',
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required','string',
                            'min:8',             // must be at least 10 characters in length
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/', // must contain a special character
                        ],

        ]);

        $res = new AddCredentials;
        $res->domain_name = $request->input('domain_name');
        $res->url = $request->input('url');
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->password = Crypt::encrypt($request->input('password'));
        $res->save();

        $request->session()->flash('msg', 'Credentials Submitted');
        return redirect('add_credentials');
    }

    
    public function edit(AddCredentials $addCredentials, Request $req)
    {
         //return view('layouts.edit_credentials')->with('credArr', AddCredentials::find($id));
        $obj = AddCredentials::find($req->id);        
        return view('layouts.edit_credentials')->with('credArr',$obj);
    }

   
    public function update(Request $request, AddCredentials $addCredentials)
    {

         $request->validate([
            'domain_name' => 'required',
            'url' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => ['required','string',
                            'min:10',             // must be at least 10 characters in length
                            'regex:/[a-z]/',      // must contain at least one lowercase letter
                            'regex:/[0-9]/',      // must contain at least one digit
                            'regex:/[@$!%*#?&]/', // must contain a special character
                        ],

        ]);

        $res=AddCredentials::find($request->id);
        $res->domain_name = $request->input('domain_name');
        $res->url = $request->input('url');
        $res->name = $request->input('name');
        $res->email = $request->input('email');
        $res->password = Crypt::encrypt($request->input('password'));
        $res->save();

        $request->session()->flash('msg', 'Data Updated');
        return redirect('add_credentials');
    
    }

    
    public function destroy(AddCredentials $addCredentials, $id)
    {
        AddCredentials::destroy('id', $id);  
        return redirect('add_credentials');      
    }
}
