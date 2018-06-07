<?php
/**
 * All constant application defined here
 */
namespace App\AppConst;
class Constants
{
    const VIEW_DIR = 'pc';
    const USER_TYPE_ROOT = 1;
    const USER_TYPE_ADMIN = 2;
    const USER_TYPE_EMPLOYEE = 3;
    const STATUS_ACTIVE = true;
    const STATUS_PAID = true;
    const STATUS_UNPAID = false;
    const STATUS_INACTIVE = false;
    const ACTIVE_TRUE = 1;
    const ACTIVE_FALSE = 0;
    /** Department type */
    const DP_TYPE_SCHOOL = 1;
    const DP_TYP_NORMAL = 2;
    /** Student study type */
    const STUDING = 1;
    const IN_SCHOOL = 2;
    const OUT_SCHOOL = 3;
    const USER_TYPE = [
        self::USER_TYPE_ROOT => 'root',
        self::USER_TYPE_ADMIN => 'admin',
        self::USER_TYPE_EMPLOYEE => 'employee'
    ];
    const ACC_TYPE = [
        self::USER_TYPE_ADMIN => 'admin',
        self::USER_TYPE_EMPLOYEE => 'employee'
    ];
    const PAGE_RECORD = 20;
    const STUDY_STATUS = [
        self::STUDING => 'Studing',
        self::IN_SCHOOL => 'In school',
        self::OUT_SCHOOL => 'Out school'
    ];
    const STATUS = [
        self::STATUS_ACTIVE => 'active',
        self::STATUS_INACTIVE => 'inactive',
        self::ACTIVE_TRUE => 'active',
        self::ACTIVE_FALSE => 'inactive'

    ];
    const GENDER = [
        1 => 'Male',
        2 => 'Female'
    ];
    const PAYMENT_STATUS = [
        self::STATUS_PAID => 'paid',
        self::STATUS_UNPAID => 'unpaid'
    ];
    const ORG_TYPE = [
        self::DP_TYPE_SCHOOL => 'school',
        self::DP_TYP_NORMAL => 'normal'
    ];
    const WORKTIME_TYPE = [
        1 => 'Part time',
        2 => 'Full time'
    ];
    const SEX = [
        1 => 'Male',
        2 => 'Female'
    ];
    const JP_DATE_FORMAT = 'Y年m月d日';
    const DATE_FORMAT = 'Y-m-d';


    /** --- System active */

}