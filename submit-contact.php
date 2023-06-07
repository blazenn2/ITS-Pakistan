<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$message = $_GET['message'];

if ($name != null && $email != null && $message != null && $phone != null) {
    $to = "sales@its-pak.com";
    $subject = 'Contact Query';
    $sendMessage = "Name: '" . $name . "' \n Email: '" . $email . "' \n Phone: '" . $phone . "' \n Message: '" . $message . "'";

    $response = mail($to, $subject, $sendMessage);

    if ($response == true) {
        echo json_encode("{'success': 'true', 'email': '" . $email . "'}");
    } else {
        http_response_code(404);
        echo json_encode("{ 'success': 'false'}");
    }
} else {
    http_response_code(404);
    echo json_encode("All Fields Required");
}
