@extends('pc.backend.layouts.default')
@section('title', trans('lang.add_new_user_confirm'))
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="/">@lang('lang.home')</a> / <a href="{{ route('users.index') }}" class="current">Detail Users</a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $user->username }}
                            </div>
                        </div>
                        <div class="form-group">
                            <hr>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            {!! Form::label('info', "Info", ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                        </div>

                        @if($user->password != "")
                            <div class="form-group col-md-8 col-md-offset-2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                                <div class="col-md-6 col-sm-6 col-xs-12" type="password">
                                    ***************
                                </div>
                            </div>
                        @endif
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $user->gender }}
                            </div>
                        </div>

                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{  $user->phone }}
                            </div>
                        </div>
                        <div class="form-group col-md-8 col-md-offset-2">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="ln_solid col-md-12"></div>
                        <div class="form-group col-md-12 text-center">
                            @if($user->id)
                                <a href="{{ route('profile.edit', ['id' => $user->id, 'back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @else
                                <a href="{{ route('profile.edit', ['back' => 'true']) }}" class="buttonFinish  btn btn-default">Back</a>
                            @endif
                            <a href="{{ route('users.complete') }}" class="buttonPrevious  btn btn-primary">@lang('lang.submit')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
