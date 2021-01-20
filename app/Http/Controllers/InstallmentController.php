<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Install;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class InstallmentController extends Controller
{

    public function OpenView()
    {   $adminn = session('user');
        $client = Client::all();
        return view('Pages.AddInstallment', ['adminn'=>$adminn,'client' => $client]);
    }
    public function Add(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'OwnerID' => 'required|max:20',



            ]
        );
        if ($validation->fails()) {

            return Redirect::back()->withErrors(['Please fill all required fields', 'The Message']);
        }

        $install = new Install();
        $install->OwnerID = $request->OwnerID;
        $install->InstallmentNumber = $request->InsNum;
        $install->Amount = $request->Amount;
        $install->InsDate = $request->IDate;
        $install->PayDate = $request->PDate;
        $install->wayTopay = $request->PMethod;


        if ($install->save()) {
            session()->flash("success", "Success");
            return redirect()->back()->with('success', 'Installment is added successfully!');
        }
    }
    public function list()
    {
        $adminn = session('user');
        $install = DB::table('installs')->get();

        return view('Pages.InstallmentsTable', compact('adminn','install'));
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'Amount'        =>    $request->Amount,
                    'InsDate' => $request->InsDate,
                    'PayDate' => $request->PayDate,
                    'wayTopay'        =>    $request->wayTopay,

                );
                DB::table('installs')
                    ->where('OwnerID', $request->OwnerID)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('installs')
                    ->where('OwnerID', $request->OwnerID)
                    ->delete();
            }
            return response()->json($request);
        }
    }
    public function blockDetails(Request $request, $id)
    {  $adminn = session('user');
        $block = DB::table('projects')
            ->where('OwnerID', $id)
            ->get();
        return view('Pages.BlockDetails', compact('adminn','block'));
    }
}
