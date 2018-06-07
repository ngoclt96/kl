@extends('pc.backend.layouts.default')
@section('title', 'Form Users')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('profile.index') }}" class="current"> Detail Users</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($user, ['url' => route('profile.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $user->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('username', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('username')]) !!}
                                <span class="error"> {{ $errors->first('username') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('info', "Info", ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('change pass', "Change pass",['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <input type="checkbox" id="checkbox" class=" control-label col-md-1 col-sm-1 col-xs-12" name="checkbox" style="margin-top: 10px; margin-left: -25px">
                        </div>
                        <div class="form-group password" style="display: none" >
                            <label for="middle-name" class=" control-label col-md-3 col-sm-3 col-xs-12">New Password <span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class=" form-control col-md-7 col-xs-12" type="password" name="password" value="{!! old('confirm_password') !!}">
                                <span class="error"> {{ $errors->first('password') ? $errors->first('password') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group password" style="display: none">
                            <label for="middle-name" class=" control-label col-md-3 col-sm-3 col-xs-12">Confirm Password <span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" class=" form-control col-md-7 col-xs-12" type="password" name="confirm_password" value="{!! old('confirm_password') !!}">
                                {{--<div class="errors-message">{!! $errors->first('confirm_password') !!}</div>--}}
                                <span class="error"> {{ $errors->first('confirm_password') ? $errors->first('confirm_password') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', "Address ", ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('gender', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false]) !!}
                                <span class="error"> {{ $errors->first('gender') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('phone', null, ['class' => 'form-control col-md-7 col-xs-12', 'maxlength' => '15', 'required' => false]) !!}
                                <span class="error"> {{ $errors->first('phone') ? $errors->first('phone') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('email', $user->email, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false]) !!}
                                <span class="error"> {{ $errors->first('email') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group text-center">
                            <a href="{{ route('profile.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            if($("#checkbox").prop( "checked" ))
            {
                $(".password").show();
            } else {
                $(".password").hide();
            }
            $("#checkbox").click(function(){
                if($(this).prop( "checked" ))
                {
                    $(".password").show();
                } else {
                    $(".password").hide();
                }
            });
        });
    </script>
@endsection
