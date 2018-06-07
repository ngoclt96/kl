@section('title', trans('lang.add_courses_confirm'))
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> / <a href="{{ route('courses.index') }}" class="current">Courses</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Titlle</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->titlle }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Titlle</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->image }}
                            </div>
                        </div>
                        {{--<div class="form-group col-md-8 col-md-offset-2">--}}
                            {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Titlle</label>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                {{--{{ $course->video }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Introduce</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->introduce }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Maxim</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->maxim }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->price }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Teacher</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->teacher_id ? $course->teacher->name : '---' }}
                            </div>
                        </div>

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Date_plan</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->date_plan }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Max_person</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->max_person }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Min_person</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->min_person }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Time_start</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->time_start }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Start_time</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $course->start_time }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ \App\AppConst\Constants::STATUS[$course->status]  }}
                            </div>
                        </div>
                        <div class="ln_solid col-md-12"></div>
                        <div class="form-group col-md-12 text-center">
                            @if($course->id)
                                <a href="{{ route('courses.edit', ['id' => $course->id, 'back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @else
                                <a href="{{ route('courses.form', ['back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @endif
                            <a href="{{ route('courses.complete') }}" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection