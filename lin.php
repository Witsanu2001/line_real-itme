<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Notification</title>
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<!-- Your HTML content here -->

<script>
// Function to check and notify when dis equals 1
function checkAndNotify() {
    // Check if already sent notification
    if (sessionStorage.getItem('notificationSent')) {
        return; // Exit the function if notification has already been sent
    }

    // Send AJAX request to server
    $.ajax({
        url: 'check_and_notify.php', // Change this to the actual filename handling the server-side logic
        type: 'POST',
        dataType: 'json',
        success: function (response) {
            // Check if the server-side logic is successful
            if (response.success) {
                // Notify user (you can customize this part based on your needs)
                alert('ส่งการแจ้งเตือนเรียบร้อยแล้ว!');

                // Set sessionStorage to indicate that notification has been sent
                sessionStorage.setItem('notificationSent', true);
            } else {
                // Handle error (you can customize this part based on your needs)
                alert('Error: ' + response.message);
            }
        },
        error: function () {
            // Handle AJAX error (you can customize this part based on your needs)
            alert('ไม่สามารถสื่อสารกับเซิร์ฟเวอร์ได้.');
        }
    });
}

// Run the function every X milliseconds (e.g., every 5 seconds)
setInterval(checkAndNotify, 5000); // Adjust the interval as needed
</script>

</body>
</html>
