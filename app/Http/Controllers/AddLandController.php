<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Marketer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AddLandController extends Controller
{

    public function OpenView()
    {
        $adminn = session('user');
        return view('Pages.AddLand',compact('adminn'));
    }
    public function Add(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'landNum' => 'required|max:20',
                'blockNum' => 'required|max:20',
                'patternNum' => 'required|max:20'


            ]
        );
        if ($validation->fails()) {

            return Redirect::back()->withErrors(['Please fill all required fields', 'The Message']);
        }

        $land = new Project();
        $land->landNum = $request->landNum;
        $land->BlockNum = $request->blockNum;
        $land->PatternNum = $request->patternNum;
        $land->landArea = $request->area;
        $land->numOfstreats = $request->strNum;
        $land->weidthOfstreats = $request->strW;
        $land->numOffaces = $request->facesNum;
        $land->MaritimeBoundary = $request->marBound;
        $land->TribalBoundary = $request->tribBound;
        $land->EasternBoundary = $request->eastBound;
        $land->WesternBoundary = $request->westBound;
        $land->Comments = $request->comments;

        if ($land->save()) {
            session()->flash("success", "Success");
            return redirect()->back()->with('success', 'Block is added successfully!');
        }
    }
}
