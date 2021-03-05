<?php

namespace App\Http\Controllers;

use App\user_profile;
use App\User;
use Illuminate\Http\Request;
use Auth;

class UserProfileController extends Controller
{
    
    public function userprofile($id)
    {
        //return view('layouts.user_profile')->with('userArr', User::find($id));
        return view('layouts.user_profile')->with('userArr', User::find($id));

    }

    public function update(Request $request, $id)
    {
        $user = User::find($request->id);
        $user->password = request('password');

        if ($user->password == 'TRUE') 
        {
            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt('password');
            $user->feWorkProfile = request('feWorkProfile');
            $user->role = 1;
            $reqHasImg = $request->hasFile('avatar');
            if ($reqHasImg) 
            {
                $filename = $request->avatar->getClientOriginalName();
                $user_img_path = $request->avatar->storeAs('users', $filename, 'public');
                $user->avatar =  $user_img_path;
            } else 
            {
                $user->avatar = null;
            }
            // dd($user);
            $user->save();
            $request->session()->flash('pSuccess', 'Profile Updated...');
            return redirect('/home');
        }
        $request->session()->flash('pCancel', 'Password Wrong...');
        return redirect('/home');
    
    }

    public function store(Request $request)
    {
        /*$res = new user_profile;
        $res->feName = $request->input('feName');
        $res->feLastName = $request->input('feLastName');
        $res->feEmailAddress = $request->input('feEmailAddress');
        $res->fePassword = $request->input('fePassword');
        $res->feDescription = $request->input('feDescription');
        $res->save();

        $request->session()->flash('msg', 'User Update');
        return redirect('user_profile');*/
    }
    
}
