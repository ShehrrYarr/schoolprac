<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $guarded =[];

     public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)
                    ->withPivot(['assigned_at', 'is_active'])
                    ->withTimestamps();
    }


    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    //Belongs to -> one to one relation 
}
