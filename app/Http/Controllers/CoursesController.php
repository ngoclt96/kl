<?php
namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CoursesRequest;
use App\Models\Bookings;
use App\Models\Categories;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;

class CoursesController extends BaseController
{
    public function index()
    {
        $model = new Courses();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_courses_remember');
        $params = request()->input();
        $course = $model->availableCourses($params);
        $course = $course->search($params);
        $course = $course->orderBy('courses.id', 'desc');
        $course = $course->paginate($this->limit);
        $this->view(['searchField' => $searchField, 'pages' => $course, 'listField' => $course]);
    }

    public function setting(Request $request)
    {
        $course = $request->input();
        $course = array_keys($course);
        session(['search_courses_remember' => $course]);
        return redirect()->to('courses');
    }

    public function form($id = null)
    {
        $course = new Courses();
        if ($id) {
            $course = Courses::findOrFail($id);
        }
        if (old()) {
            $course->fill(old());
        }
        (request()->session()->has('coursesConfirm') && request()->query('back') == 'true') ? $course = request()->session()->get('coursesConfirm') : request()->session()->forget('coursesConfirm');
        $course->id = $id;
        $teacher = $course->pluckTeachers();
        $this->view(['course' => $course, 'teachers' => $teacher]);
    }

    public function confirm(CoursesRequest $request)
    {
        $course = new Courses();
        $course_category = new Courses();
        $course->fill($request->input());
        if ($request->input('id')) {
            $course->id = $request->input('id');
        }
        if($request->input('category_id')){
            $course_category->category_id = $request->input('category_id');
        }
//        dd($course);
//        $category = DB::table('categories')->whereIn('categories.id', $course_category->category_id)->first();
        $request->session()->put('coursesConfirm', $course);
        $request->session()->put('news_data', $course_category);

        $this->view(['course' => $course]);
//        dd($category);
//        $this->view(compact('course'));
    }

    public function complete()
    {
        if (!request()->session()->has('coursesConfirm')) {
            return redirect(route('courses.index'));
        }
        $coursesConfirm = request()->session()->get('coursesConfirm');

        if ($coursesConfirm->id) {
            $coursesConfirm->exists = true;
        }
       if($coursesConfirm->save()) {
           request()->session()->forget('coursesConfirm');

       }

        $this->view();
    }

    public function delete()
    {
        $this->deleteRecord('Courses');
        return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));

    }



}
