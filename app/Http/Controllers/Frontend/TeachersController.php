<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends BaseController
{

    public function construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getViewDir() . '.home.teacher');
    }

    public function listTeachers() {
        $model = new Teachers();
        $teacher = $model->select('teachers.id', 'teachers.avatar', 'teachers.name', 'teachers.certificate')
            ->where('teachers.deleted', 0)->get();
        return view('pc.home.teacher', ['teachers' => $teacher]);
    }

    public function detail_of_teacher($teacher_id) {
        $model = new Teachers();
        $detail_teacher = $model->where([['teachers.id', $teacher_id],['teachers.deleted', 0]])
            ->select('teachers.id', 'teachers.name', 'teachers.avatar', 'teachers.email',
                'teachers.sdt', 'teachers.certificate')->paginate(3);
        return view('pc.home.detail_teacher', ['detai_of_teacher' => $detail_teacher]);
    }


}
