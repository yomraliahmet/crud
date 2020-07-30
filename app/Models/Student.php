<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'gender',
        'image',
        'is_active'
    ];

    public function getGenderAttribute($value)
    {
        return trans("models.students.".$value);
    }

    public function getIsActiveAttribute($value)
    {
        return trans("models.students.is_active.".$value);
    }
}
