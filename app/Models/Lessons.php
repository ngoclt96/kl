<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Lessons extends BaseModel
{

    protected $table = 'lessons';

    public $timestamps = true;

    protected $fillable = ['course_id', 'title', 'content',
        'start_time', 'end_time', 'status', 'deleted'];
    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'title' => [
            'label' => 'Title',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'course_id' => [
            'label' => 'Course_id',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
            ]
        ],
        'content' => [
            'label' => 'Content',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'start_time' => [
            'label' => 'Start_time',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => 'date',
            ]
        ],
        'end_time' => [
            'label' => 'End_time',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => 'date',
            ]
        ],
        'status' => [
            'label' => 'Status',
            'default' => true,
            'search' => [
                'type' => 'selectbox',
                'placeholder' => '---',
                'data' => \App\AppConst\Constants::STATUS
            ]
        ]
    ];

    public function course() {
        return $this->belongsTo('App\Models\Courses');
    }

    public function pluckCourses() {
        return DB::table('courses')->where(['status' => true, 'deleted' => false])->pluck('titlle', 'id');
    }

    public function scopeAvailableLessons($query, $params)
    {
        $query->where('deleted', false);
        if (isset($params['sort']) && $params['sort']) {
            $key = strtolower(array_keys(getSort())[0]);
            if (array_key_exists($key, $this->searchAble)) {
                unset($params['sort']);
                $query = $query->orderBy("courses." . $key, getSort($key));
            }
        }


        return $query;
    }


}
