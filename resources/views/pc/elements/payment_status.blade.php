@if($payment_status  == 1)
    <button type="button" class="btn btn-primary btn-xs">@lang('lang.paid')</button>
@endif
@if($payment_status == 0)
    <button type="button" class="btn btn-disabled btn-xs">@lang('lang.unpaid')</button>
@endif

