<?php
session_start();

// Database connection
$cnx = mysqli_connect("127.0.0.1", "root", "", "dcp");

if (!$cnx) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetching messages from the database
$query = "SELECT * FROM messages ORDER BY datemessage DESC";
$result = mysqli_query($cnx, $query);

if (!$result) {
    die("Error fetching messages: " . mysqli_error($cnx));
}

mysqli_close($cnx);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - Latest Messages</title>
    <link rel="stylesheet" href="stylesNew.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Latest News</h1>
        </header>

        <main>
            <?php
            $i=1;
            if (mysqli_num_rows($result) > 0) {
                // Loop through and display each message
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = htmlspecialchars($row['idmessage']);
                    $message = htmlspecialchars($row['message']);
                    $date = htmlspecialchars($row['datemessage']);
                    echo "
                    <div class='message'>
                        <h3>Message #$i</h3>
                        
                        <p class='message-content'>$message</p>
                        <p class='message-date'>$date</p>
                    </div>";
                    $i++;
                }
            } else {
                echo "<p>No news available at the moment.</p>";
            }
            ?>
        </main>
    </div>
</body>
</html>
