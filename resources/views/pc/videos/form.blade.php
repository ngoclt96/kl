@section('title', 'Form videos')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('videos.index') }}" class="current"> Videos</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($video, ['url' => route('videos.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $video->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Course<span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('course_id', $course, null, ['class' => 'form-control', 'placeholder' => '___Choose course_id']) !!}
                                <span class="error"> {{ $errors->first('course_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Lesson<span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('lesson_id', $lesson, null, ['class' => 'form-control', 'placeholder' => '___Choose lesson_id']) !!}
                                <span class="error"> {{ $errors->first('lesson_id') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Introduction<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('introduction', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('introduction')]) !!}
                                <span class="error"> {{ $errors->first('introduction') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Link<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('link', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('link')]) !!}
                                <span class="error"> {{ $errors->first('link') ?? '' }}</span>
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
                            <a href="{{ route('videos.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection