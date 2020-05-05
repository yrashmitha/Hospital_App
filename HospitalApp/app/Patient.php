<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $primaryKey = 'p_id';

    public function medicalRecords(){
        return $this->hasMany('App\MedicalRecords','p_id','p_id');
    }

}
