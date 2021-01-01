<?php
header('Content-Type: application/json');
include "library/tmn_gif.class.php";
error_reporting(0);
ini_set('display_errors', 0);
$phone = "0910504092";
$tw = new phaiwan_tmn_gif();

if (isset($_GET['phone']) || isset($_GET['link'])) {
    $xxx = json_decode($tw->redeem($_GET['link'], $_GET['phone']), true);

    if ($xxx['status']['code'] == "SUCCESS") {
        $am = number_format($xxx['data']['voucher']['amount_baht'], 0, '.', '');

        $data = array(
            "status" => "success",
            "point" => $am
        );
        echo json_encode($data);
    } else {
        $data = array(
            "status" => "error",
            "message" => "ลิงก์ไม่ถูกต้องหรือเคยใช้งานไปแล้ว"
        );
        echo json_encode($data);
    }
}else{
    $data = array(
        "status" => "error",
        "message" => "กรุณาใส่ ลิงก์ และเบอร์ที่จะรับ ?link=xxxxxxxxx&phone=0999999999"
    );
    echo json_encode($data);

}
