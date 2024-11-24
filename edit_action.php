<?php
// Establish database connection
$cnx = mysqli_connect("127.0.0.1", "root", "", "dcp");
if (!$cnx) {
    die("Connection failed: " . mysqli_connect_error());
}

$messageStatus = "";
$success = false;

// Check if 'id', 'content', and 'date' are present in the POST request
if (isset($_POST['id']) && isset($_POST['content']) && isset($_POST['date'])) {
    $id = intval($_POST['id']); // Sanitize ID
    $message = $_POST['content']; // Get the message content
    $date = $_POST['date']; // Get the date

    // Prepare and execute the update query
    $query = "UPDATE messages SET message = ?, datemessage = ? WHERE idmessage = ?";
    $stmt = mysqli_prepare($cnx, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $message, $date, $id);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $messageStatus = "Message with ID $id has been successfully updated.";
        $success = true;
    } else {
        $messageStatus = "Error: Could not update the message, or no changes were made.";
    }

    mysqli_stmt_close($stmt);
} else {
    $messageStatus = "Error: Missing data. Ensure 'id', 'content', and 'date' are provided.";
}

// Close the database connection
mysqli_close($cnx);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Action Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit News Result</h1>

        <!-- Display Status Message -->
        <div class="message <?php echo $success ? 'success' : 'error'; ?>">
            <?php echo htmlspecialchars($messageStatus); ?>
        </div>

        <!-- Go Back to Dashboard -->
        <a href="admin.php" class="back-btn">Back to Dashboard</a>
    </div>
</body>
</html>
