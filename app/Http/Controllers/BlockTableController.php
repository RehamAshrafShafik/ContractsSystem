<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;



class BlockTableController extends Controller
{

	public function OpenView()
	{
		$adminn = session('user');
		$land = DB::table('projects')->get();

		return view('Pages.BlockTable', compact('land','adminn'));
	}
	function action(Request $request)
	{
		if ($request->ajax()) {
			if ($request->action == 'edit') {
				$data = array(
					'landNum'		=>	$request->landNum,
					'BlockNum' => $request->BlockNum,
					'PatternNum' => $request->PatternNum,
					'landArea' => $request->landArea,
					'numOfstreats'=>$request->numOfstreats,
					'weidthOfstreats'=>$request->weidthOfstreats,
					'numOffaces' =>$request->numOffaces,
					'MaritimeBoundary' =>$request->MaritimeBoundary,
					'TribalBoundary' =>$request->TribalBoundary,
					'EasternBoundary' =>$request->EasternBoundary,
					'WesternBoundary' =>$request->WesternBoundary,
					'Comments' =>$request->Comments,

				);
				DB::table('projects')
					->where('indexx', $request->indexx)
					->update($data);
			}
			if ($request->action == 'delete') {
				DB::table('projects')
					->where('indexx', $request->indexx)
					->delete();
			}
			return response()->json($request);
		}
	}
}
