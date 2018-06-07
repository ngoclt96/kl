<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TeacherRequest;
use App\Models\Categories;
use App\Models\Teachers;

class TeachersController extends BaseController
{
    public function index()
    {
        $model = new Teachers();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_teachers_remember');
        $params = request()->input();
        $teacher = $model->availableTeachers($params);
        $teacher = $teacher->search($params);
        $teacher = $teacher->orderBy('teachers.id', 'desc');
        $teacher = $teacher->paginate($this->limit);

        $this->view(['searchField' => $searchField, 'pages' => $teacher, 'listField' => $teacher]);
    }

    public function setting(Request $request)
    {
        $teacher = $request->input();
        $teacher = array_keys($teacher);
        session(['search_teachers_remember' => $teacher]);
        return redirect()->to('teachers');
    }

    public function form($id = null)
    {
        $teacher = new Teachers();
        if ($id) {
            $teacher = Teachers::findOrFail($id);
        }
        if (old()) {
            $teacher->fill(old());
        }
        (request()->session()->has('teachersConfirm') && request()->query('back') == 'true') ? $teacher = request()->session()->get('teachersConfirm') : request()->session()->forget('teachersConfirm');
        $teacher->id = $id;
        $this->view(['teacher' => $teacher]);
    }

    public function confirm(TeacherRequest $request)
    {
        $teacher = new Teachers();
        $teacher->fill($request->input());
        if ($request->input('id')) {
            $teacher->id = $request->input('id');
        }
        $request->session()->put('teachersConfirm', $teacher);
        $this->view(['teacher' => $teacher]);
    }

    public function complete()
    {
        if (!request()->session()->has('teachersConfirm')) {
            return redirect(route('teachers.index'));
        }
        $teachersConfirm = request()->session()->get('teachersConfirm');

        if ($teachersConfirm->id) {
            $teachersConfirm->exists = true;
        }
        $teachersConfirm->save();
        request()->session()->forget('teachersConfirm');
        $this->view();
    }

    public function delete()
    {
        $this->deleteRecord('Teachers');
        return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));

    }



}
