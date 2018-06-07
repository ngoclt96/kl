<?php

namespace App\Models;

/**
 * @property mixed type_mail
 */
class Members extends BaseModel
{

    private static $type_mail;
    public static $check_attemp_member = false;
    protected $table = 'members';

    public $timestamps = true;

    protected $fillable = ['name', 'email', 'sdt','gender',
        'introduce', 'avatar', 'password', 'status', 'deleted', 'auth_token', 'extra_token'];
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
        'sdt' => [
            'label' => 'Sdt',
            'default' => true,
            'sort' => 'numeric',
            'search' => [
                'type' => '',
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
        'avatar' => [
            'label' => 'Avatar',
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



    protected static function boot() {

        parent::boot();
        static::created(function ($model) {
            switch (self::$type_mail) {
                case 'user_register_member':
                    event(new MailRegisterMemberEvent($model));
                    break;
                default:
                    break;
            }
            return true;
        });
    }

    public static function create(array $attributes = [])
    {
        $model = new static($attributes);

        $model->save();

        return $model;
    }



    public function bookings() {
        return $this->hasMany('App\Models\Bookings');
    }
//    public function bookings() {
//        return $this->hasMany('App\Models\Bookings');
//    }

    public function scopeAvailableMembers($query, $params)
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
    public function deleteWithEmailExisted($email){

        return $this->where('email','=',$email)->where('active','=',ACTIVE_FALSE)->forcedelete();
    }


}
