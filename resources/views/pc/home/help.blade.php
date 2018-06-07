<!DOCTYPE html>
<html lang="en">
<body>
<div>
    <?php
    $cleartext = "amount: ".$amount."\n"."account number: 0071001088218 \n";
    $msg_hash = md5($cleartext);
    openssl_private_encrypt($msg_hash, $sig, $private_key);
    $signed_data = $msg_hash . "----SIGNATURE:----" . $sig;
//
//    $public_key = request()->session()->get('public_key');
//
//    list($plain_data,$old_sig) = explode("----SIGNATURE:----", $signed_data);
//    openssl_public_decrypt($old_sig, $decrypted_sig, $public_key);
//            dd($decrypted_sig);
//    $data_hash = md5($plain_data);
//    if($decrypted_sig != null) {
//        if($decrypted_sig == $data_hash && strlen($data_hash)>0) {
//            dd(1);
////                return $plain_data;
//        }
//
//        else {
////                return "ERROR -- untrusted signature";
//            dd(2);
//        }
////
//    }
//    else {
//        return "Public key is invalid";
//    }

    ?>
        To complete the registration, please pay:<br/>
        Payment amount: {{$amount}}<br/>
    To complete the registration process, please transfer money to your account number:<br/>
    0071001088218<br/>
    Account name: Le Thi Ngoc<br/>

    Signed data:<br/> <?php $result = str_replace(' ', '&nbsp;', $signed_data);
    $result = nl2br($result);
    echo $result?><br/>
    Please you click on the link to check whether the data has changed and input data has been provided to the form upon request: <br/>
    <a href="{{$link}}">{{$link}}</a><br/>



</body>
</html>




