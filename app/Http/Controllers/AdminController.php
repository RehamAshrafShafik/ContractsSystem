<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Install;
use App\Models\Project;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //
    // public function __construct()
    // {
    //   $this->middleware('auth');
    // }
    public function login(Request $request)
    {
        
        $validation = Validator::make(
            $request->all(),
            [
                'email' => 'required|max:255',
                'password' => 'required|max:20',

            ]
        );
        /* $validation->after(function($validation){
            if ($this->somethingElseIsInvalid())
            {
                $validation->errors()->add('field','Email or password is invalid');
            }
        });*/
        if ($validation->fails()) {

            return Redirect::back()->withErrors(['Email or Password is invalid', 'The Message']);
        }

        $adminn = Admin::where('Email', $request->email)->get()->first();
        $client = DB::table('projects')
            ->where('OwnerID', '<>', null)
            ->get();
        $marketer = Marketer::all();
        $land = Project::all();
        $install = Install::all();
        //dd($adminn);
        if ($adminn->Password == $request->password) {
           session(["user"=> $adminn]);
           session()->save();
        //    dd(session()->all() );
            return view('Pages.Admin', ['adminn'=>$adminn,'client' => $client, 'market' => $marketer, 'land' => $land, 'install' => $install]);
        } else {
            return view('Pages.Home',compact('adminn'));
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return view("Pages.Home");
    }
}
