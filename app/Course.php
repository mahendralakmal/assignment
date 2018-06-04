<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','year'];

    public function students(){
        return $this->hasMany(Students::Class);
    }
}
