<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Courses extends BaseModel
{

    protected $table = 'courses';

    public $timestamps = true;

    protected $fillable = ['titlle', 'image', 'video', 'price', 'introduce', 'maxim', 'teacher_id', 'date_plan', 'max_person', 'min_person',
        'time_start', 'start_time', 'status', 'deleted'];
    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'titlle' => [
            'label' => 'Titlle',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'image' => [
            'label' => 'Image',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'introduce' => [
            'label' => 'Introduce',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'teacher_id' => [
            'label' => 'Teacher_id',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
            ]
        ],
        'price' => [
            'label' => 'Price',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
            ]
        ],
        'date_plan' => [
            'label' => 'Date_plan',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => 'date',
            ]
        ],
        'max_person' => [
            'label' => 'Max_person',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
            ]
        ],
        'min_person' => [
            'label' => 'Min_person',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
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

    public function teacher() {
        return $this->belongsTo('App\Models\Teachers');
    }
    public function member() {
        return $this->belongsTo('App\Models\Members');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Bookings');
    }


    public function pluckTeachers() {
        return DB::table('teachers')->where(['status' => true, 'deleted' => false])->pluck('name', 'id');
    }


    protected static function boot() {
        parent::boot();
        static::deleting(function($course) {
            $course->category()->detach();
        });
    }


    public function scopeAvailableCourses($query, $params)
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
