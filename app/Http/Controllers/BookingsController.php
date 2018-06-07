<?php
namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Bookings;
use App\Models\Categories;
use App\Models\Courses;

class BookingsController extends BaseController
{
    public function index()
    {
        $model = new Bookings();
        $searchField = $model->getSearchAbleField();
        $model->getSearch('search_bookings_remember');
        $params = request()->input();
        $booking = $model->availableBookings($params);
        $booking = $booking->search($params);
        $booking = $booking->orderBy('bookings.id', 'desc');
        $booking = $booking->paginate($this->limit);
        $this->view(['searchField' => $searchField, 'pages' => $booking, 'listField' => $booking]);
    }

    public function setting(Request $request)
    {
        $booking = $request->input();
        $booking = array_keys($booking);
        session(['search_bookings_remember' => $booking]);
        return redirect()->to('bookings');
    }

    public function form($id = null)
    {
        $booking = new Bookings();
        if ($id) {
            $booking = Bookings::findOrFail($id);
        }
        if (old()) {
            $booking->fill(old());
        }
        (request()->session()->has('bookingsConfirm') && request()->query('back') == 'true') ? $booking = request()->session()->get('bookingsConfirm') : request()->session()->forget('bookingsConfirm');
        $booking->id = $id;
        $course = $booking->pluckCourses();
        $member = $booking->pluckMembers();
        $this->view(['booking' => $booking, 'courses' => $course, 'members' => $member]);
    }

    public function confirm(BookingRequest $request)
    {
        $booking = new Bookings();
        $amount = Courses::where('courses.id', $request->input('course_id'))->select('courses.price')->first();
        $booking->fill($request->input());

        if ($request->input('id')) {
            $booking->id = $request->input('id');
        }

        $request->session()->put('bookingsConfirm', $booking);
        $this->view(['booking' => $booking, 'amount' => $amount]);
    }

    public function complete()
    {
        if (!request()->session()->has('bookingsConfirm')) {
            return redirect(route('bookings.index'));
        }
        $bookingsConfirm = request()->session()->get('bookingsConfirm');
        if ($bookingsConfirm->id) {
            $bookingsConfirm->exists = true;
        }
        $bookingsConfirm->save();
        $booking = Bookings::where('id', $bookingsConfirm->id);
        $slot = Bookings::where('id', $bookingsConfirm->id)->select('slot')->first();

        $amount = Courses::where('courses.id', $bookingsConfirm->course_id)->select('courses.price')->first();
        $data = [
            'amount' => ($amount->price)*($slot->slot),
        ];

        $booking->update($data);
        request()->session()->forget('bookingsConfirm');
        $this->view();
    }

    public function delete()
    {
        $this->deleteRecord('Bookings');
        return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));

    }



}
