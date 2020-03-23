<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    //
    protected $guarded = [];

    public function surveys()
    {
        return $this->belongsTo(Survey::class);
    }
}
