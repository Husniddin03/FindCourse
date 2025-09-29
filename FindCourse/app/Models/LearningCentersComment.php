<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCentersComment extends Model
{
    use HasFactory;

    protected $fillable = ['learning_center_id', 'usersId', 'comment'];

    public function learningCenter()
    {
        return $this->belongsTo(LearningCenter::class, 'learning_center_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usersId');
    }
}
