<!DOCTYPE html>
<html>
<head>
    <title>Paypal</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-container">
    @if($message = \Illuminate\Support\Facades\Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display = 'none'" class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php \Illuminate\Support\Facades\Session::forget('success')?>
    @endif

    @if($message = \Illuminate\Support\Facades\Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display = 'none'" class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php \Illuminate\Support\Facades\Session::forget('error');?>
        @endif
    <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{!! \Illuminate\Support\Facades\URL::to('paypal') !!}"
    {{csrf_field()}}
    <h2 class="w3-text-blue"> Payment Form</h2>
    <p>Demo paypal form - Integrating paypal in laravel</p>
        <label class="w3-text-blue"><b>Enter amount</b></label>
    <input class="w3-input w3-border" id="amount" type="text" name="amount"></input>
    <button class="w3-btn w3-blue">Pay with paypal</button>
</div>
</body>
</html>