<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'photo',
        'learning_centers_id',
    ];

    public function learningCenter()
    {
        return $this->belongsTo(LearningCenter::class, 'learning_centers_id');
    }
}
