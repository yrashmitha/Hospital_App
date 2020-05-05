<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalRecords extends Model
{
    protected $primaryKey = 'r_id';

    //
    public function doctor()
    {
        return $this->belongsTo('App\Doctor','d_id','d_id');
    }

    public function patient(){
        return $this->belongsTo('App\Patient','p_id','p_id');
    }

}
