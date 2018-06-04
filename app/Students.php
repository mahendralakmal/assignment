<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $fillable = ['name','classes_id','dob','city'];

    public function parent(){
        return $this->belongsToMany(Parents::Class);
    }

    public function course()
    {
        return $this->belongsTo(Course::Class);
    }
}
