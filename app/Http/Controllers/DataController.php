<?php

namespace App\Http\Controllers;

use App\Models\Accesstype;
use App\Models\Image;
use App\Models\UserAccessType;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:userdatas',
            'state' => 'required|string',
            'user_name' => 'required|string',
            'password' => 'required|min:3',
            'profileimage' => 'image|mimes:jpg,jpeg,png|max:1024'

        ]);
        $adddata = Userdata::create([
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        if ($request->hasFile('profileimage')) {
            $path = $request->file('profileimage')->store('ProfileImages');
            $adddata->image()->save(
                Image::create([
                    'file_path' => $path,
                    'userdata_id' => $adddata->id
                ])
            );
        }

        $useraccess_type = new UserAccessType();
        $useraccess_type->userid = $adddata->id;
        $useraccess_type->useraccessid = $request->input('access_type');
        $useraccess_type->save();

        return view('login');
    }

    public function adduser(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:userdatas',
            'state' => 'required|string',
            'user_name' => 'required|string',
            'password' => 'required|min:8',
            'profileimage' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);

        $adddata = Userdata::create([
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        if ($request->hasFile('profileimage')) {
            $path = $request->file('profileimage')->store('ProfileImages');
            $adddata->image()->save(
                Image::create([
                    'file_path' => $path,
                    'userdata_id' => $adddata->id
                ])
            );
        }

        $useraccess_type = new UserAccessType();
        $useraccess_type->userid = $adddata->id;
        $useraccess_type->useraccessid = $request->input('access_type');
        $useraccess_type->save();

        return redirect()->route('user.dashboard');
    }

    public function show()
    {
        $userdatas = Userdata::all();
        return view('users.show', compact('userdatas'));
    }

    public function display($id)
    {
        $data = Userdata::find($id);
        return view('users.display', compact('data'));
    }

    public function edit($id)
    {
        $data = Userdata::find($id);
        return view('users.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $userdatas = Userdata::findOrFail($id);
        $userdatas->update($request->all());
        $userdatas->save();
        return redirect()->route('user.show');
    }

    public function delete($id)
    {
        $userdatas = Userdata::findOrFail($id);
        $userdatas->delete();
        return redirect()->route('user.show');
    }

    public function login(Request $request)
    {
        $val = Userdata::where('email', $request->email)
                ->first();

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data))
        {
            $img = Image::where('userdata_id',$val->id)->first();

            session(['id' => $val->id]);
            session(['first_name' => $val->first_name]);
            session(['last_name' => $val->last_name]);
            session(['email' => $val->email]);
            session(['state' => $val->state]);
            session(['user_name' => $val->user_name]);
            session(['file_path' => $img->file_path]);


            $userAccessType = UserAccessType::where('userid', session('id'))->first();


            $accessType = Accesstype::where('id', $userAccessType->useraccessid)->value('access_type');
            session(['access_type' => $accessType]);

            return redirect()->route('user.dashboard');
        }
        else{

            return redirect()->route('user.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login');
    }


}
