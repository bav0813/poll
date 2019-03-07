<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    public function votersinfo()
    {
        return $this->hasMany('App\VotersInfo','candidate_id');

    }
}
