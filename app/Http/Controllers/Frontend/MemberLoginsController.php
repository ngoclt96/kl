<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Mail\OrderShipped;
use App\Models\Courses;
use App\Models\Members;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\Cache\Repository as Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use phpseclib\Crypt\RSA;

class MemberLoginsController extends BaseController
{
    use ValidatesRequests;
    use AuthenticatesUsers;

    protected $cache;
    var $email;

    public function __construct(Cache $cache)
    {
        parent::__construct();
        $this->cache = $cache;
//        $this->middleware('user_guest', ['except' => 'logout']);
//        $this->middleware('check_attemp:User', ['only' => 'login']);
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
        return view('pc.home.register', ['member' => $member]);
    }

    public function confirm(Request $request)
    {
        $member = new Members();
        $member->fill($request->input());
        if ($request->input('id')) {
            $member->id = $request->input('id');
        }
        $request->session()->put('membersConfirm', $member);
        return view('pc.home.register_confirm', ['member' => $member]);
    }

    public function complete()
    {
        if (!request()->session()->has('membersConfirm')) {
            return redirect(route('register.form'));
        }
        $membersConfirm = request()->session()->get('membersConfirm');
        $membersConfirm->password = encrypt($membersConfirm->password);
        $membersConfirm->auth_token = mt_rand(1111111111, 9999999999) . time() . mt_rand(1111111111, 9999999999);;
        $membersConfirm->extra_token = sha1('['.date('Y-m-d H:i:s').']');


        $res=openssl_pkey_new();
        openssl_pkey_export($res, $privatekey);
        $publickey=openssl_pkey_get_details($res);
        $publickey=$publickey["key"];
        $membersConfirm->privateKey	 = $privatekey;
//        file_put_contents('public.pem', $publickey);

        if ($membersConfirm->id) {
            $membersConfirm->exists = true;
        }
        $membersConfirm->save();
        $user = Members::findOrFail($membersConfirm->id);

        $this->email = $user->email;
//        dd($user->publicKey);
        $data = [
            'link' => URL::to("/active/".$user->extra_token),
            'publicKey' => $publickey
        ];
        Mail::send('pc.home.mail', $data, function ($smg) {
           $smg->to($this->email, 'dwdw')->subject('day la email');
            
        });
        request()->session()->forget('membersConfirm');
        return redirect(route('member.login.form'));
    }

    public function active($token = null)
    {
        $member = Members::where('extra_token', $token);
        if(!empty($member)){
            $data = [
                'extra_token' => null,
                'status' => 1,
            ];
            $member->update($data);
        }
        return redirect(route('home.index'));
    }

    public function login_form() {
        return view('pc.home.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:members,' . 'email' . '',
            'password' => 'required|min:8',
        ],
            [
                'email' . '.exists' => 'Email is invalid or the account has been disabled.'
            ]);
        $member = Members::where('email',$request->email)
                    ->where('status', 1)->first();
        if(decrypt($member->password) === $request->input('password')){
            $request->session()->put('member_name',$member->name);
            $request->session()->put('member_id',$member->id);
            return redirect(route('home.index'));
        }
        else {
            return redirect(route('member.login.form'))->with('thongbao', 'Dang nhap khong thanh cong');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('member_name');
        $request->session()->forget('member_id');
        $this->guard()->logout();
        return redirect(route("home.index"));
    }







}
