<?php
function connectDB()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "notifications";

    $objCon = mysqli_connect($servername, $username, $password, $dbName);
    mysqli_set_charset($objCon, "utf8");
    return $objCon;
}


function sendLineNotification($accessToken, $message) {
    $ch = curl_init();

    $url = 'https://notify-api.line.me/api/notify';
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $accessToken);
    $postData = http_build_query(array('message' => $message));

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        // Handle cURL error
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Check the HTTP response code from LINE Notify
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Check if the notification was sent successfully
        if ($httpCode !== 200) {
            // Handle HTTP error
            echo 'HTTP error code: ' . $httpCode;
        }
    }

    // Close cURL resource
    curl_close($ch);
}
?>
