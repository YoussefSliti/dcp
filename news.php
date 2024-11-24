<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
$user_name = $_SESSION['user_name'];
$user_family_name = $_SESSION['user_family_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../Navigation/TopNavBar/style.css">
</head>
<body>
    <?php 
    include("../../Navigation/TopNavBar/TopNavBar.php");
    ?>
    
    
</body>
</html>