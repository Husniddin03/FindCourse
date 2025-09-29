<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCentersConnect extends Model
{
    use HasFactory;

    protected $fillable = ['learning_center_id', 'connection_id'];

    public function learningCenter()
    {
        return $this->belongsTo(LearningCenter::class, 'learning_center_id');
    }

    public function connection()
    {
        return $this->belongsTo(Connection::class, 'connection_id');
    }
}
