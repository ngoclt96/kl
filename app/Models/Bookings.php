<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bookings extends BaseModel
{
    protected $table = "bookings";

    protected $fillable = [
        'course_id', 'member_id', 'slot', 'amount', 'paymen_status', 'status', 'deleted'
    ];

    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'course_id' => [
             'label' => 'Course_id',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'member_id' => [
             'label' => 'Member_id',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'slot' => [
             'label' => 'Slot',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'amount' => [
            'label' => 'Amount',
            'default' => false,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'paymen_status' => [
            'label' => 'Paymen_status',
            'default' => true,
            'search' => [
                'type' => 'selectbox',
                'placeholder' => '---',
                'data' => \App\AppConst\Constants::PAYMENT_STATUS

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

    public $timestamps = true;
    public function courses() {
        return $this->belongsTo('App\Models\Courses', 'course_id', 'id');
    }

    public function members() {
        return $this->belongsTo('App\Models\Members', 'member_id', 'id');
    }

    public function pluckCourses() {
         return DB::table('courses')->where(['status' => true, 'deleted' => false])->pluck('titlle', 'id');
     }
     public function pluckMembers() {
         return \DB::table('members')->where(['status' => true, 'deleted' => false])->pluck('name', 'id');
     }

    protected static function boot() {
        parent::boot();
        static::deleting(function($course) {
//            $course->category()->detach();
        });
    }

    public function scopeAvailableBookings($query, $params)
    {
        $query->where('deleted', false);
        if (isset($params['sort']) && $params['sort']) {
            $key = strtolower(array_keys(getSort())[0]);
            if (array_key_exists($key, $this->searchAble)) {
                unset($params['sort']);
                $query = $query->orderBy("bookings." . $key, getSort($key));
            }
        }
        

        return $query;
    }
}
