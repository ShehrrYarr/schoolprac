<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
      use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'capacity',
        'notes',
    ];

    /**
     * Many-to-Many: A classroom can have many students.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class)
                    ->withPivot(['assigned_at', 'is_active'])
                    ->withTimestamps();
    }
}
