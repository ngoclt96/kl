@section('title', 'Form courses')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('courses.index') }}" class="current"> Courses</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($course, ['url' => route('courses.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $course->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Titlle<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('titlle', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('titlle')]) !!}
                                <span class="error"> {{ $errors->first('titlle') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Image </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('image', null, ['id' => 'url', 'onclick' => 'openPopup()', 'class' => 'form-control col-md-7 col-xs-12', 'required' => false]) !!}
                                <span class="error"> {{ $errors->first('image') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Price<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('price', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('price')]) !!}
                                <span class="error"> {{ $errors->first('price') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Introduce <span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('introduce', null, ['class' => 'form-control col-md-7 col-xs-12 ckeditor', 'id' => 'news-content']) !!}
                                <span class="error"> {{ $errors->first('introduce') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Maxim <span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::textarea('maxim', null, ['class' => 'form-control col-md-7 col-xs-12 ckeditor', 'id' => 'news-content']) !!}
                                <span class="error"> {{ $errors->first('maxim') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Teachers<span class="textred">(*)</span> </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('teacher_id', $teachers, null, ['class' => 'form-control', 'placeholder' => '___Choose teacher_id']) !!}
                                <span class="error"> {{ $errors->first('teacher_id') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date_plan<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('date_plan', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('date_plan')]) !!}
                                <span class="error"> {{ $errors->first('date_plan') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Max_person<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('max_person', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('max_person')]) !!}
                                <span class="error"> {{ $errors->first('max_person') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Min_person<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('min_person', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('min_person')]) !!}
                                <span class="error"> {{ $errors->first('min_person') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Time_start<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('time_start', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('time_start')]) !!}
                                <span class="error"> {{ $errors->first('time_start') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Start_time<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('start_time', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('start_time')]) !!}
                                <span class="error"> {{ $errors->first('start_time') ?? '' }}</span>
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
                            <a href="{{ route('courses.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                            <button type="submit" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script>
        function openPopup() {
            CKFinder.popup( {
                // Configure CKFinder's popup size.
                width: 800,
                height: 500,
                // Enable file choose mechanism.
                chooseFiles: true,
                // Restrict user to choose only from Images resource type.
                resourceType: 'Images',
                // Add handler for events that are fired when user select's file.
                onInit: function( finder ) {
                    // User selects original image.
                    finder.on( 'files:choose', function( evt ) {
                        // Get first file because user might select multiple files
                        var file = evt.data.files.first();
                        showUploadedImage( file.getUrl() )
                    } );

                    // User selects resized image.
                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        showUploadedImage( evt.data.resizedUrl );
                    } );
                }
            } );
        }
        function showUploadedImage( url ) {
            // Update field's value
            jQuery( '#url' ).val( url );

            // Show chosen image
            var img = jQuery( '<img>' ).attr(  url );
            jQuery( '#side-feature-img' ).html( img );
        }
    </script>




@endsection