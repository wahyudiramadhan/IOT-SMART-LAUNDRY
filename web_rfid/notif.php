<?php
include "database.php";

function sendMessage($telegram_id, $message_text, $secret_token) {

    $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
    $url = $url . "&text=" . urlencode($message_text);
    $ch = curl_init();
    $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
    );
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
header("Location:user data.php");

/*----------------------
only basic POST method :
-----------------------*/
$pdo = Database::connect();
$sql = "SELECT * FROM tb_data where id='$id ";
$id = $_GET['id'];


$id=['id'];


$telegram_id = "898383350"; 
$message_text = "Landry Tanyoe, Jln.Pinto Aceh Menginformasikan Baju anda telah selesai dengan id :$id";

/*--------------------------------
Isi TOKEN dibawah ini: 
--------------------------------*/
$secret_token = "1121003394:AAHFykAL3DUjfhWVtvrfv9ZlPv7syPnvxlw";
sendMessage($telegram_id, $message_text, $secret_token);


