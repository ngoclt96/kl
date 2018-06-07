<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Models\Departments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController
{
    public function index()
    {
        $model = new User();
        if (Auth::check()) {
            $model = User::findOrFail(Auth::user()->id);
        }
//       dd($model);
        $this->view(['pages' => $model]);
    }
    public function form($id = Null)
    {
        $user = new User();
        if (Auth::check()) {
            $user = User::findOrFail(Auth::user()->id);
        }
        (request()->session()->has('usersConfirm') && request()->query('back') == 'true') ? $employee = request()->session()->get('usersConfirm') : request()->session()->forget('usersConfirm');
        $this->view(['user' => $user]);
    }
    public function confirm(ProfileRequest $request)
    {
        $user = new User();
        $user->fill($request->input());
        if ($request->input('id') ) {
            $user->id = $request->input('id');
        }
        if ($request->input('checkbox')) {
            $user->password = Hash::make($request->input('password'));
            $request->session()->put('usersConfirm', $user);
        }
        else{
            $request->session()->put('usersConfirm', $user);
        }
        $this->view(['user' => $user]);
    }
    public function complete()
    {
        if (!request()->session()->has('usersConfirm')) {
            return redirect(route('profile.index'));
        }
        $usersConfirm = request()->session()->get('usersConfirm');
        if ($usersConfirm->id) {
            $usersConfirm->exists = true;
        }
        if ($usersConfirm->save()) {
            request()->session()->forget('usersConfirm');
        }
        $this->view();
    }

}
