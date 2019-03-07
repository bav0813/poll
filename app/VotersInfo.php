<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotersInfo extends Model
{
    protected $fillable = ['phone', 'candidate_id'];

    public function candidates()
    {
        return $this->belongsTo('App\Candidates');
    }

}
