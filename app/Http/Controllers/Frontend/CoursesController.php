<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CourseReviewsRequest;
use App\Models\Bookings;
use App\Models\Course_Review;
use App\Models\Courses;
use App\Models\Members;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class CoursesController extends BaseController
{
    use ValidatesRequests;

    public function authorize($ability, $arguments = [])
    {
        list($ability, $arguments) = $this->parseAbilityAndArguments($ability, $arguments);

        return app(Gate::class)->authorize($ability, $arguments);
    }

    protected function parseAbilityAndArguments($ability, $arguments)
    {
        if (is_string($ability)) {
            return [$ability, $arguments];
        }

        return [debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3)[2]['function'], $ability];
    }

    public function construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view($this->getViewDir() . '.home.course');
    }

    public function listCourse()
    {
        $model = new Courses();
        $course = $model->select('courses.id', 'courses.image', 'courses.teacher_id', 'courses.titlle',
            'courses.price', 'teachers.name', 'teachers.avatar as image_teacher', 'courses.introduce')
            ->join('teachers', 'teachers.id', 'courses.teacher_id')
            ->where('courses.deleted', 0)->paginate(6);
        return view('pc.home.course', ['course' => $course]);
    }

    public function detail_of_course($course_id)
    {
        $model = new Courses();
        $course = $model->select('courses.*', 'teachers.name', 'teachers.avatar')
            ->where('courses.id', $course_id)
            ->where([['courses.status', 1], ['courses.deleted', 0]])
            ->join('teachers', 'teachers.id', 'courses.teacher_id')
            ->get();
        $course_review_count = Course_Review::where('course_reviews.course_id', $course_id)->count();
        $comment = Course_Review::select('course_reviews.*', 'members.avatar', 'members.name')
            ->where('course_reviews.course_id', $course_id)
            ->join('members', 'members.id', 'course_reviews.member_id')
            ->paginate(6);
        return view('pc.home.detail_course', ['detai_of_course' => $course, 'count_comment' => $course_review_count, 'comment' => $comment]);
    }

    public function form_message($id)
    {
        $course_review = new Course_Review();
        (request()->session()->has('courseReview') && request()->query('back') == 'true') ? $course_review = request()->session()->get('courseReview') : request()->session()->forget('courseReview');
        $course_review->course_id = $id;
        $course_review->member_id = request()->session()->get('member_id');
        return view('pc.home.course_review', ['cmt' => $course_review]);

    }

    public function save_message(CourseReviewsRequest $request, Members $members)
    {
        $course_review = new Course_Review();
        $course_review->fill($request->input());
        if ($request->input('id')) {
            $course_review->member_id = request()->session()->get('member_id');
        }
        $course_review->save();
        return redirect(route('home.detail_course', ['id' => $course_review->course_id]));


    }

    public function book($id)
    {
        $booking = new Bookings();
        (request()->session()->has('booking') && request()->query('back') == 'true') ? $booking = request()->session()->get('courseReview') : request()->session()->forget('booking');
        $booking->course_id = $id;
        $booking->member_id = request()->session()->get('member_id');
        return view('pc.home.booking', ['book' => $booking]);
    }

    public function save_book(Request $request)
    {
        $this->validate($request, [
            'slot' => 'required|integer'
        ]);
        $book = new Bookings();
        $book->fill($request->input());
        if ($request->input('id')) {
            $book->member_id = request()->session()->get('member_id');
            $book->paymen_status = 0;
        }
        $book->save();
        $booking = Bookings::where('id', $book->id);
        $slot = Bookings::where('id', $book->id)->select('slot')->first();

        $amount = Courses::where('courses.id', $book->course_id)->select('courses.price')->first();
        $data = [
            'amount' => ($amount->price) * ($slot->slot),
        ];

        $booking->update($data);
        return redirect(route('booking.bill', ['id' => $book->id]));

    }

    public function cancel_course($id) {
        $book = Bookings::where('id', $id);
        $book->delete();
        return redirect(route('home.index'));
    }

    public function bill($id)
    {
        $model = new Bookings();
        $book = $model->select('bookings.*', 'members.email', 'members.name', 'members.sdt',
            'courses.titlle', 'courses.price', 'courses.time_start', 'courses.date_plan',
            'courses.teacher_id', 'teachers.name', 'teachers.email', 'teachers.certificate')
            ->where('bookings.id', $id)
            ->where([['bookings.status', 1], ['bookings.deleted', 0]])
            ->join('members', 'members.id', 'bookings.member_id')
            ->join('courses', 'courses.id', 'bookings.course_id')
            ->join('teachers', 'teachers.id', 'courses.teacher_id')
            ->get();
       foreach ($book as $item) {

           $user = Members::findOrFail($item->member_id);
           $this->email = $user->email;
           $data = [
               'course_name' => $item->titlle,
               'price_of_course' => $item->price,
               'slot_registered' => $item->slot,
               'amount' => $item->amount,
               'private_key' =>  $user->privateKey,
               'public_key' =>  $user->publicKey,
               'link' => URL::to("/verify"),
           ];

           Mail::send('pc.home.order', $data, function ($smg) {
               $smg->to($this->email, 'dwdw')->subject('Hoa don san pham');
           });
           Mail::send('pc.home.help', $data, function ($smg) {
               $smg->to($this->email, 'dwdw')->subject('Huong dan thanh toan');
           });
       }

        return view('pc.home.bill', ['book' => $book]);
    }

    public function form_verify()
    {
        return view('pc.home.verify');
    }

    public function verify(Request $request)
    {
        $this->validate($request, [
            'data_signed' => 'required',
            'public_key' => 'required'
        ]);


        list($plain_data,$old_sig) = explode("----SIGNATURE:----", $request->input('data_signed'));
        openssl_public_decrypt($old_sig, $decrypted_sig, $request->input('public_key'));
        $data_hash = md5($plain_data);

            if($decrypted_sig != $data_hash && strlen($data_hash)>0) {
                return $plain_data."The data is not changed and the signature is trusted";
            }

            else {
                return "ERROR -- untrusted signature";
            }
        }


}
