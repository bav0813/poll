<?php

namespace App\Http\Controllers;

use App\Http\Resources\Voting;
use App\Candidates;
use App\VotersInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{

    /*adding data through  API POST request like:
    curl -X POST http://localhost:8000/api/smspoll  -H
    "Accept: application/json"  -H "Content-Type: application/json"  -d
    '{"phone": "123456789", "candidate_id": "1"}'

    */
    public function create(Request $request)
    {
        try {
            $vote = VotersInfo::create ( $request->all () );
            return response ()->json ( $vote , 201 );

        } catch (\Exception $ex) {
            return response()->json('Error saving data', 500);

        }
    }




    /*retrieving data from DB*/
    public function index(Request $request)
    {
        $candidate_result = Candidates::withCount ( 'VotersInfo' )->get ();
        if($request->ajax()) {
            return response()->json($candidate_result, 200);
        }

        return view('results',['cnd_res'=>$candidate_result]);
    }






}
