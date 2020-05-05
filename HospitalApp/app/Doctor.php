<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $primaryKey = 'd_id';
    //

    public function medicalRecords()
    {
        return $this->hasMany('App\MedicalRecords','r_id','d_id');
    }

}
