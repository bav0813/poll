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



//    public function sendapidata()
//    {
//        header("Content-Type: application/json");
//
//        $url = 'http://localhost:8000/api/smspoll';
//        $data=
//            '{
//              "phone": "447700900001",
//              "candidate_id": "3",
//
//            }';
//
//        $ch = curl_init('http://localhost:8000/api/smspoll' . '/q/splash');
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        curl_exec($ch);
//        $returned=curl_multi_getcontent($ch);
//        var_dump ($returned);
//        curl_close ($ch);
//        //  var_dump ($returned);
//        //   var_dump(http_response_code());
//
//
//
//
//    }



}
