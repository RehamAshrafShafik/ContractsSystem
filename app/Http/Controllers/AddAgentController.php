<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AddAgentController extends Controller
{

    public function OpenView()
    {
        $adminn = session('user');
        return view('Pages.AddAgent', compact('adminn'));
    }
    public function Add(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'ID' => 'required|max:20',
                'telephone' => 'required|max:11',
                'address' => 'required|max:255'

            ]
        );
        if ($validation->fails()) {

            return Redirect::back()->withErrors(['Please fill all required fields', 'The Message']);
        }

        $market = new Marketer();
        $market->Name = $request->name;
        $market->ID = $request->ID;
        $market->Phone = $request->telephone;
        $market->address = $request->address;
        if ($market->save()) {
            session()->flash("success", "Success");
            return redirect()->back()->with('success', 'Agent is added successfully!');
        }
    }

    public function list(Request $request)
    {
        $adminn = session('user');
        $market = DB::table('marketers')->get();
        return view('Pages.CommissionsTable', compact('market' ,'adminn'));
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'Name'    =>    $request->Name,
                    'ID'        =>    $request->ID,
                    'Phone'        =>    $request->Phone,
                    'Address' =>    $request->Address

                );
                DB::table('marketers')
                    ->where('ID', $request->ID)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('marketers')
                    ->where('ID', $request->ID)
                    ->delete();
            }
            return response()->json($request);
        }
    }
    public function CommDetails(Request $request, $Name)
    {
        $adminn = session('user');
        $MP = DB::table('payments')
            ->where('Marketer', $Name)
            ->get();

        return view('Pages.CommessionDetails', compact('adminn','MP', 'Name'));
    }
}
