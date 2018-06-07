@section('title',trans('lang.complete_member_update'))
@extends('pc.layouts.default')
@section('content')
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_content">
                    <div class="alert alert-success">
                        @lang('lang.success')
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                            <a href="{!! route('members.index') !!}" class="btn btn-primary">@lang('lang.go_to_manager')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection