<?php
function OTP($code){
    $conn = conectdb();
    $stmt = $conn->prepare("SELECT code FROM user WHERE code LIKE '%$code%' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kqotp = $stmt->fetchAll();
    return $kqotp;
}

function updateOTP($code, $email){
    $conn=conectdb();
    $sql = "UPDATE user SET code = ? WHERE email= ?";
    $stmt = $conn -> prepare($sql);
    $stmt->execute([$code, $email]);
}

function forgetPass($pass, $email) {
    $conn = conectdb();
    $sql = "UPDATE user SET pass = ? WHERE email = ? ";
    $stmt = $conn -> prepare($sql);
    $stmt->execute([$pass, $email]);
}

