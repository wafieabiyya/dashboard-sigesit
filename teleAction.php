<?php

include 'assets/server/connection.php';

$CHAT_ID = $_POST['chatId'];
$BOT = '5912573318:AAFEIs3n63XgkXNiaCDExSQN6nCGmAPSJB0'; // ini nanti diisi sama API sendiri di tele, pake BotFather

$FILENAME = 'pdf/QR Generate.pdf';

// Create CURL object
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $BOT . "/sendDocument?chat_id=" . $CHAT_ID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Create CURLFile
$finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $FILENAME);
$cFile = new CURLFile($FILENAME, $finfo);

// Add CURLFile to CURL request
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "document" => $cFile
]);

// Call
$result = curl_exec($ch);

// Show result and close curl
var_dump($result);
curl_close($ch);
?>