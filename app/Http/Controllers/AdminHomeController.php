<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Install;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;




class AdminHomeController extends Controller
{
    //
    public function home(Request $request)
    {


        $adminn = session('user');
        $client = DB::table('projects')
            ->where('OwnerID','<>',null)
            ->get();

        $marketer = Marketer::all();
        $land = Project::all();
        $install = Install::all();
        //dd($adminn);

        return view('Pages.Admin', ['adminn'=>$adminn, 'client' => $client, 'market' => $marketer, 'land' => $land, 'install' => $install]);
    }
}
