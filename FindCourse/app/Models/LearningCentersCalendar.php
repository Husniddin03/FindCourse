<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCentersCalendar extends Model
{
    use HasFactory;

    protected $fillable = ['learning_center_id', 'calendar_id', 'openTime', 'closetime'];

    public function learningCenter()
    {
        return $this->belongsTo(LearningCenter::class, 'learning_center_id');
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class, 'calendar_id');
    }
}
