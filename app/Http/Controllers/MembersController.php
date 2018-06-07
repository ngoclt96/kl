<?php
namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\MemberRequest;
use App\Models\Categories;
use App\Models\Members;

class MembersController extends BaseController
{
    public function index()
    {
        $model = new Members();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_members_remember');
        $params = request()->input();
        $member = $model->availableMembers($params);
        $member = $member->search($params);
        $member = $member->orderBy('members.id', 'desc');
        $member = $member->paginate($this->limit);
        $this->view(['searchField' => $searchField, 'pages' => $member, 'listField' => $member]);
    }

    public function setting(Request $request)
    {
        $member = $request->input();
        $member = array_keys($member);
        session(['search_member_remember' => $member]);
        return redirect()->to('members');
    }

    public function form($id = null)
    {
        $member = new Members();
        if ($id) {
            $member = Members::findOrFail($id);
        }
        if (old()) {
            $member->fill(old());
        }
        (request()->session()->has('membersConfirm') && request()->query('back') == 'true') ? $member = request()->session()->get('membersConfirm') : request()->session()->forget('membersConfirm');
        $member->id = $id;
        $this->view(['member' => $member]);
    }

    public function confirm(MemberRequest $request)
    {
        $member = new Members();
        $member->fill($request->input());
        if ($request->input('id')) {
            $member->id = $request->input('id');
        }
        $request->session()->put('membersConfirm', $member);
        $this->view(['member' => $member]);
    }

    public function complete()
    {
        if (!request()->session()->has('membersConfirm')) {
            return redirect(route('members.index'));
        }
        $membersConfirm = request()->session()->get('membersConfirm');

        if ($membersConfirm->id) {
            $membersConfirm->exists = true;
        }
        $membersConfirm->save();
        request()->session()->forget('membersConfirm');
        $this->view();
    }

    public function delete()
    {
        $this->deleteRecord('Members');
        return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));

    }



}
