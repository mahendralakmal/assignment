<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    protected $fillable = ['name','dob','type'];

    public function student(){
        return $this->belongsToMany(Students::class);
    }
}
