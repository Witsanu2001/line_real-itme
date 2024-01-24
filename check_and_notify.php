<?php
include_once('function.php');
$objCon = connectDB();
$strSQL = "SELECT * FROM disease WHERE dis = 1";
$objQuery = mysqli_query($objCon, $strSQL);

// ตรวจสอบว่าสถานะการส่งข้อมูลไปยัง LINE Notify
$alreadySent = false;

// เช็คว่ามี session หรือไม่
if (!isset($_SESSION)) {
    session_start();
}

// ตรวจสอบว่ามีค่า session เก็บข้อมูลการแจ้งเตือนหรือไม่
if (!isset($_SESSION['notified_data'])) {
    $_SESSION['notified_data'] = array();
}

if ($objQuery) {
    while ($row = mysqli_fetch_assoc($objQuery)) {
        // ตรวจสอบว่ารายการนี้ยังไม่ได้รับการแจ้งเตือน
        if (!in_array($row['d_id'], $_SESSION['notified_data'])) {
            // รายการที่มี dis เท่ากับ 1 ให้ดำเนินการต่อไป
            $lineMessage = $row['d_name'] . ' เป็นโรค';
            $lineAccessToken = 'QuGdESh1h2nYRI7kmcawzsfzcAm04ZZbKSlZMFfCMTK';

            // ตรวจสอบว่า Token LINE Notify ไม่ว่างเปล่าหรือไม่
            if (!empty($lineAccessToken)) {
                // ดำเนินการส่งข้อมูลไปยัง LINE Notify
                sendLineNotification($lineAccessToken, $lineMessage);

                // อัปเดตสถานะการส่งข้อมูลเป็น true
                $alreadySent = true;

                // เก็บรายการที่ได้ส่งแจ้งเตือนลงใน session เพื่อไม่ให้ส่งซ้ำ
                $_SESSION['notified_data'][] = $row['d_id'];
            } else {
                echo 'Error: LINE Access Token is empty.';
            }
        }
    }
} else {
    echo 'Error: Unable to fetch data from the database.';
}
?>
