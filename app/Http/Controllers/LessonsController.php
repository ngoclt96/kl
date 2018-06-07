<?php
namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CoursesRequest;
use App\Http\Requests\LessonRequest;
use App\Models\Bookings;
use App\Models\Categories;
use App\Models\Courses;
use App\Models\Lessons;

class LessonsController extends BaseController
{
    public function index()
    {
        $model = new Lessons();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_lessons_remember');
        $params = request()->input();
        $lesson = $model->AvailableLessons($params);
        $lesson = $lesson->search($params);
        $lesson = $lesson->orderBy('lessons.id', 'desc');
        $lesson = $lesson->paginate($this->limit);
        $this->view(['searchField' => $searchField, 'pages' => $lesson, 'listField' => $lesson]);
    }

    public function setting(Request $request)
    {
        $lesson = $request->input();
        $lesson = array_keys($lesson);
        session(['search_lessons_remember' => $lesson]);
        return redirect()->to('lessons');
    }

    public function form($id = null)
    {
        $lesson = new Lessons();
        if ($id) {
            $lesson = Lessons::findOrFail($id);
        }
        if (old()) {
            $lesson->fill(old());
        }
        (request()->session()->has('lessonsConfirm') && request()->query('back') == 'true') ? $lesson = request()->session()->get('lessonsConfirm') : request()->session()->forget('lessonsConfirm');
        $lesson->id = $id;
        $course = $lesson->pluckCourses();
        $this->view(['course' => $course, 'lesson' => $lesson]);
    }

    public function confirm(LessonRequest $request)
    {

        $lesson = new Lessons();
        $lesson->fill($request->input());
        if ($request->input('id')) {
            $lesson->id = $request->input('id');
        }
        $request->session()->put('lessonsConfirm', $lesson);
        $this->view(['lesson' => $lesson]);
    }

    public function complete()
    {
        if (!request()->session()->has('lessonsConfirm')) {
            return redirect(route('lessons.index'));
        }
        $lessonsConfirm = request()->session()->get('lessonsConfirm');

        if ($lessonsConfirm->id) {
            $lessonsConfirm->exists = true;
        }
        $lessonsConfirm->save();
        request()->session()->forget('lessonsConfirm');
        $this->view();
    }

    public function delete()
    {
        $this->deleteRecord('Lessons');
        return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));

    }



}
