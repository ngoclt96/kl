<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IntroduceController extends BaseController
{

    public function construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getViewDir() . '.home.introduce');
    }



}
