<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Course_Review extends BaseModel
{
    protected $table = "course_reviews";

    protected $fillable = [
        'course_id', 'member_id', 'content', 'point', 'status', 'deleted'
    ];

    public $timestamps = true;

    public function member()
    {
        return $this->belongsTo('App\Models\Members');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Courses', 'course_id');
    }

}
