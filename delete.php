<?php

$cnx=mysqli_connect("127.0.0.1", "root", "", "dcp");
if (!$cnx) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $query = "DELETE FROM messages WHERE idmessage = ?";
    $stmt = mysqli_prepare($cnx, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Message with ID $id has been deleted.";
        echo "<a href='admin.php' class='back-btn'>Back to Dashboard</a>";
        
    
    
    } else {
        echo "Error: Could not delete the message.";
        echo "<a href='admin.php' class='back-btn'>Back to Dashboard</a>";
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error: No ID provided.";
}


mysqli_close($cnx);
?>







