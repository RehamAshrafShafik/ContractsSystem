<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;


class ContractListController extends Controller
{
 
    
    public function OpenView()
    {
        $adminn = session('user');
        $client = DB::table('clients')->get();
        $land = DB::table('projects')->get();
        $pay = DB::table('payments')->get();
        $mar = DB::table('marketers')->get();
        foreach ($client as $c) {
            $user = Project::where('OwnerID', $c->OwnerID)->exists();

            //dd($user);
            if ($user == false) {
                DB::table('clients')
                    ->where('OwnerID', $c->OwnerID)
                    ->delete();
                DB::table('payments')
                    ->where('OwnerID', $c->OwnerID)
                    ->delete();
                DB::table('installs')
                    ->where('OwnerID', $c->OwnerID)
                    ->delete();
            }
        }
        return view('Pages.ContractsTable',  compact('client', 'land', 'pay', 'mar','adminn'));
    }
}
