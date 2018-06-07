<!DOCTYPE html>
<html>
<head>
    <title>Paypal integertion</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="POST" id="payment-form" action="{{!! URL::to('paypal')}}">
    <div class="w3-container w3-teal w3-padding-16">Paywith paypal</div>
    {{csrf_field()}}
    <h2 class="w3-text-blue">Payment form</h2>
    <p>Demo paypal form - Integrating paypal in laravel</p>
    <label class="w3-text-blue"><b>Enter Amount</b></label>
    <input class="w3-input w3-border" id="amount" type="text" name="amount">
    <button class="w3-btn w3-blue">Pay with Paypal</button>
</form>
</body>
</html>
