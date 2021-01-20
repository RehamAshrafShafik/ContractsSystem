<?php

namespace App\Http\Controllers;

use session;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Install;
use App\Models\Payment;
use App\Models\Project;
use App\Models\Marketer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class ContractController extends Controller
{
 
    public function OpenView()
    {
        $adminn = session('user');
        $market = Marketer::all();
        $land = Project::all();
        $Lnumbers = array();
        $Bnumbers = array();
        $Pnumbers = array();


        foreach ($land as $l) {
            array_push($Lnumbers, $l->landNum);
            array_push($Bnumbers, $l->BlockNum);
            array_push($Pnumbers, $l->PatternNum);

            $Lnumbers = array_unique($Lnumbers);
            $Bnumbers = array_unique($Bnumbers);
            $Pnumbers = array_unique($Pnumbers);
        }


        return view('Pages.AddContract', ['adminn'=> $adminn,'market' => $market, 'lnumbers' => $Lnumbers, 'bnumbers' => $Bnumbers, 'pnumbers' => $Pnumbers]);
    }
    public function Add(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'ID' => 'required|max:20',
                'telephone' => 'required|max:11',
                'address' => 'required|max:255',
                'landNum' => 'required|max:11',




            ]
        );
        if ($validation->fails()) {

            return Redirect::back()->withErrors(['Please fill all required fields', 'The Message']);
        }

        $client = new Client();
        $client->OwnerName = $request->name;
        $client->OwnerID = $request->ID;
        $client->telephone = $request->telephone;
        $client->address = $request->address;
        if ($request->secondID) {
            $client2 = new Client();
            $client2->OwnerName = $request->secondName;
            $client2->OwnerID = $request->secondID;
            $client2->telephone = $request->secondTelephone;
            $client2->address = $request->secondAddress;
            $client2->save();
        }


        $land = DB::table('projects')->where([
            ['landNum', $request->landNum],
            ['PatternNum', $request->patternNum], ['BlockNum', $request->Blocknumber]
        ])
            ->update(['OwnerID' => $request->ID]);

        $pay = new Payment();
        $pay->OwnerID = $request->ID;
        $pay->LandNum = $request->landNum;
        $pay->BlockNum = $request->Blocknumber;
        $pay->PatternNum = $request->patternNum;
        $pay->TotalPrice = $request->totPrice;
        $pay->FirstPaid = $request->frstP;

        //$pay->installment=$request->chkInstallment;
        $ins = new Install();
        if ($request->chkInstallment) {
            $pay->installment = 1;

            $pay->InstallmentAmount = $request->IAm;
            $pay->numOfinstallments = $request->INum;
            $pay->wayTopay = $request->meth;
            $pay->BankNum = $request->bank;
            $pay->dateOffrstInstallment = $request->frstidate;
            $ins->OwnerID = $request->ID;
            $ins->LandNum = $request->landNum;
            $ins->BlockNum = $request->blockNum;
            $ins->PatternNum = $request->patternNum;
        } else {
            $pay->installment = 0;
        }
        $pay->OtherPayments = $request->other;
        $pay->PaymentsAmount = $request->otherA;
        $pay->numOfPayments = $request->otherN;
        $pay->dateOfContract = $request->Cdate;
        $pay->AdministrativeExpenses = $request->Aexp;
        $pay->AdminstarWayTopay = $request->Away;
        $pay->MarketingCommission = $request->Camount;
        $pay->Marketer = $request->mar;
        $pay->PaidDiscount = $request->PD;
        $pay->Comments = $request->PComments;

        //$thread=auth()=>
        if ($request->has('authenticsignature')) {
            //dd($request->file('authenticsignature'));
            $custom_name = $request->ID . '.' . $request->file('authenticsignature')->getClientOriginalExtension();
            $pay->AuthenticSignature = $request->file('authenticsignature')->storeAs('AuthnSignature', $custom_name, 'public');
        }
        if ($request->has('Signingup')) {
            //dd($request->file('authenticsignature'));
            $custom_name1 = $request->ID . '.' . $request->file('Signingup')->getClientOriginalExtension();
            $pay->Signingup = $request->file('Signingup')->storeAs('Signingup', $custom_name1, 'public');
        }
        if ($request->has('Authorization')) {
            //dd($request->file('authenticsignature'));
            $custom_name2 = $request->ID . '.' . $request->file('Authorization')->getClientOriginalExtension();
            $pay->Authorization = $request->file('Authorization')->storeAs('Authorization', $custom_name2, 'public');
        }
        if ($request->has('Otherfiles')) {
            //dd($request->file('authenticsignature'));
            $custom_name3 = $request->ID . '.' . $request->file('Otherfiles')->getClientOriginalExtension();
            $pay->OtherFiles = $request->file('Otherfiles')->storeAs('Otherfiles', $custom_name3, 'public');
        }

        if ($client->save()  && $pay->save()) {
            session()->flash("success", "Success");
            return redirect()->back()->with('success', 'Contract is added successfully!');
        }
    }
    function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                // $data = array(['OwnerID'=>	$request->OwnerID]);
                DB::table('projects')
                    ->where(['OwnerID' => $request->OwnerID])
                    ->update(['OwnerID' => null]);
                DB::table('projects')
                    ->where(['landNum' => $request->landNum, 'PatternNum' => $request->PatternNum, 'BlockNum' => $request->BlockNum])
                    ->update(['OwnerID' =>    $request->OwnerID]);
                $data1 = array(
                    'landNum' => $request->landNum,
                    'BlockNum' => $request->BlockNum,
                    'PatternNum' =>    $request->PatternNum,
                    'TotalPrice' => $request->TotalPrice,
                    'FirstPaid' => $request->FirstPaid,
                    'AdministrativeExpenses' => $request->AdministrativeExpenses,
                    'Marketer' => $request->Marketer,

                    'MarketingCommission' => $request->MarketingCommission,
                    'Comments' => $request->Comments,

                );
                DB::table('payments')
                    ->where('OwnerID', $request->OwnerID)
                    ->update($data1);
            }
            if ($request->action == 'delete') {
                $delContract = array('OwnerID' => null);
                DB::table('projects')
                    ->where('OwnerID', $request->OwnerID)
                    ->update($delContract);
                DB::table('clients')
                    ->where('OwnerID', $request->OwnerID)
                    ->delete();
                DB::table('payments')
                    ->where('OwnerID', $request->OwnerID)
                    ->delete();
                DB::table('installs')
                    ->where('OwnerID', $request->OwnerID)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
