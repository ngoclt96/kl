<!DOCTYPE html>
<html lang="en">
<body>
<div>
Congratulations on signing up for this account.<br/>
To make transactions, please activate your registered account by visiting the link below:<br/>
    <a href="{{$link}}">{{$link}}</a><br/>
    They have been given for you a key to use each transaction.<br/>
    Please please do not allow this route, if not an toàn account will be corrupt.<br/>
    Below the key you have been upgraded and use as your signature.<br/>
    <br/>
    <?php $result = str_replace(' ', '&nbsp;', $publicKey);
    $result = nl2br($result);
    echo $result?>

</div>
</body>
</html>




