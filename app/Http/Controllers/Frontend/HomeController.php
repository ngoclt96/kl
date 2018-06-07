<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BaseController
{

    public function construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getViewDir() . '.home.index');
    }

    public function course()
    {
        return view($this->getViewDir() . '.home.course');
    }

    public function listCourse() {
        $model = new Courses();
        $course = $model->select('courses.id', 'courses.image', 'courses.teacher_id', 'courses.titlle',
            'courses.price', 'teachers.name', 'teachers.avatar as image_teacher', 'courses.introduce')
            ->join('teachers', 'teachers.id', 'courses.teacher_id')
            ->where('courses.deleted', 0)
            ->where('courses.status', 1)
            ->orderBy('courses.id','desc')->paginate(3);
        $panel = $model->select('image')
            ->where('courses.deleted', 0)
            ->where('courses.status', 1)
            ->orderBy('courses.id','desc')->paginate(3);
        return view('pc.home.index', ['course' => $course, 'panels' => $panel]);
    }



}
