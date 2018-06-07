@section('title', 'Form members')
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> > <a href="{{ route('members.index') }}" class="current"> Members</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::model($member, ['url' => route('members.confirm'), 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('id', $member->id) !!}
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('name', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('name')]) !!}
                                <span class="error"> {{ $errors->first('name') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('email', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('email')]) !!}
                                <span class="error"> {{ $errors->first('email') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> Avatar </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('avatar', null, ['id' => 'url', 'onclick' => 'openPopup()', 'class' => 'form-control col-md-7 col-xs-12', 'required' => false]) !!}
                                <span class="error"> {{ $errors->first('avatar') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sdt</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('sdt', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('sdt')]) !!}
                                <span class="error"> {{ $errors->first('sdt') ?? '' }}</span>
                            </div>
                        </div>
                        <div class="form-group password" >
                            <label for="middle-name" class=" control-label col-md-3 col-sm-3 col-xs-12">Password <span class="textred">(*)</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::password('password', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('password')]) !!}
                                <span class="error"> {{ $errors->first('password') ?? '' }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Introduce</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('introduce', null, ['class' => 'form-control col-md-7 col-xs-12', 'required' => false, 'value' => old('introduce')]) !!}
                                <span class="error"> {{ $errors->first('introduce') ?? '' }}</span>
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
                            <a href="{{ route('members.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
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