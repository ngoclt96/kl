@section('title', trans('lang.add_booking_confirm'))
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> / <a href="{{ route('bookings.index') }}" class="current">Bookings</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Course</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $booking->courses ? $booking->courses->titlle : '---' }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Member</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $booking->members ? $booking->members->name : '---' }}
                            </div>
                        </div>

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Slot</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $booking->slot }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ ($amount->price)*($booking->slot) }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Paymen_status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ \App\AppConst\Constants::PAYMENT_STATUS[$booking->paymen_status]  }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ \App\AppConst\Constants::STATUS[$booking->status]  }}
                            </div>
                        </div>
                        <div class="ln_solid col-md-12"></div>
                        <div class="form-group col-md-12 text-center">
                            @if($booking->id)
                                <a href="{{ route('bookings.edit', ['id' => $booking->id, 'back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @else
                                <a href="{{ route('bookings.form', ['back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @endif
                            <a href="{{ route('bookings.complete') }}" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection