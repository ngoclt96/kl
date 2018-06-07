<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Teachers extends BaseModel
{

    protected $table = 'teachers';

    public $timestamps = true;

    protected $fillable = ['name', 'email', 'sdt', 'avatar',
        'certificate', 'status', 'deleted'];
    protected $searchAble = [
        'id' => [
            'label' => 'ID',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => ''
            ]
        ],
        'name' => [
            'label' => 'Name',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'email' => [
            'label' => 'Email',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
            ]
        ],
        'avatar' => [
            'label' => 'Avatar',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'image',
            ]
        ],
        'sdt' => [
            'label' => 'Sdt',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
            ]
        ],
        'certificate' => [
            'label' => 'Certificate',
            'default' => true,
            'sort' => 'alpha',
            'search' => [
                'type' => 'text',
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

    public function courses() {
        return $this->hasMany('App\Models\Courses');
    }

    public function scopeAvailableTeachers($query, $params)
    {
        $query->where('deleted', false);
        if (isset($params['sort']) && $params['sort']) {
            $key = strtolower(array_keys(getSort())[0]);
            if (array_key_exists($key, $this->searchAble)) {
                $query = $query->orderBy( $key, getSort($key));
            }
        }
        return $query;
    }


}
