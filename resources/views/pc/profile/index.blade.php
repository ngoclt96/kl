@extends('pc.backend.layouts.default')
@section('title', 'Form Users')
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
                        @if (Auth::check())
                            <div class="form-group col-md-8 col-md-offset-2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ $pages->username }}
                                </div>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{$pages->email }}
                                </div>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">gender</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ $pages->Gender }}
                                </div>
                            </div>
                            <div class="form-group col-md-8 col-md-offset-2">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {{ $pages->phone }}
                                </div>
                            </div>
                        @endif

                    </div>

                </div>
                <div class="form-group  col-md-offset-3">
                    <a href="{{ route('users.index') }}" class="buttonFinish  btn btn-default">@lang('lang.back')</a>
                    <a href="{{route('profile.edit')}}" class="btn btn-primary btn-xs">@lang('lang.edit')</a>
                </div>
            </div>
        </div>
    </div>

@endsection
