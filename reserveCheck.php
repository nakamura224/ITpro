<?php

session_start();
$dname = htmlspecialchars($_POST["dname"]);
$dtelno = htmlspecialchars($_POST["dtelno"]);
$dmail = htmlspecialchars($_POST["dmail"]);
$message = htmlspecialchars($_POST["message"]);
//入力値をセッションに格納する
$_SESSION['reserve']['dname'] = $dname;
$_SESSION['reserve']['dtelno'] = $dtelno;
$_SESSION['reserve']['dmail'] = $dmail;
$_SESSION['reserve']['message'] = $message;

//エラーメッセージを格納する
$errMsg = array();

//未入力チェック
if(empty($dname) == true){
    $errMsg['dname'] = "名前が未入力です";
}
if(empty($dtelno) == true){
    $errMsg['dtelno'] = "電話番号が未入力です";
}
if(empty($dmail) == true){
    $errMsg['dmail'] = "メールアドレスが未入力です";
}

if(count($errMsg) == 0){
    header("location:./reserveConfirm.php");
}else{
 $_SESSION['errMsg'] = $errMsg;
header("location:./reserveDetail.php");
}
exit();