@section('title', 'Form lessons')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('lessons.index') }}" class="current"> Lessons</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($lesson, ['url' => route('lessons.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $lesson->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Title</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('title', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('title')]) !!}
                                <span class="error"> {{ $errors->first('title') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Course_id<span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('course_id', $course, null, ['class' => 'form-control', 'placeholder' => '___Choose course_id']) !!}
                                <span class="error"> {{ $errors->first('course_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Content</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('content', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('content')]) !!}
                                <span class="error"> {{ $errors->first('content') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Start_time</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('start_time', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('start_time')]) !!}
                                <span class="error"> {{ $errors->first('start_time') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">End_time</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('end_time', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('end_time')]) !!}
                                <span class="error"> {{ $errors->first('end_time') ?? '' }}</span>
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
                            <a href="{{ route('lessons.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection