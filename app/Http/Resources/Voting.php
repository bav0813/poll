<?php

namespace App\Http\Resources;

use App\VotersInfo;
use Illuminate\Http\Resources\Json\Resource;

class Voting extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'created_at' => $this->created_at
        ];
    }

    public function create(Request $request)
    {

//        $vote = new Voting;
//        $vote->phone = $request->phone;
//        $vote->pcandidate_id = $request->candidate_id;
//        if ($vote->save ()) {
        $vote= VotersInfo::create($request->all ());
        return response()->json($vote, 201);


        }

}
