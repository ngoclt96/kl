@section('title', 'Form bookings')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('bookings.index') }}" class="current"> Bookings</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($booking, ['url' => route('bookings.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $booking->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Course </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'placeholder' => '___Choose course_id']) !!}
                                <span class="error"> {{ $errors->first('course_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Member </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('member_id', $members, null, ['class' => 'form-control', 'placeholder' => '___Choose member_id']) !!}
                                <span class="error"> {{ $errors->first('member_id') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Slot<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('slot', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('price')]) !!}
                                <span class="error"> {{ $errors->first('slot') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Paymen_status <span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('paymen_status', \App\AppConst\Constants::PAYMENT_STATUS, null, ['class' => 'form-control', 'placeholder' => '___Choose paymen_status   ___']) !!}
                                <span class="error"> {{ $errors->first('paymen_status') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('status', \App\AppConst\Constants::STATUS, null, ['class' => 'form-control', 'placeholder' => '___Choose Status   ___']) !!}
                                <span class="error"> {{ $errors->first('status') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group text-center">
                            <a href="{{ route('bookings.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection