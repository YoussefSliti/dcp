<?php
session_start();

$emailLogin = $_POST["email"];
$passwordLogin = $_POST["password"];

if (empty($emailLogin)) {
    die("You must enter your email !!!");
    exit;
}
if (empty($passwordLogin)) {
    die("You must enter your password !!!");
    exit;
}

// Include PersonClass
if (file_exists('../classes/PersonClass.php')) {
    include_once('../classes/PersonClass.php');
} else {
    echo "<script>alert('PersonClass.php file not found!')</script>";
    exit;
}

$pers = new PersonClass();
$user = $pers->searchPerson($emailLogin, $passwordLogin);

if ($user) {
    $_SESSION['user_id'] = $user["id"];
    $_SESSION['user_name'] = $user["name"];
    $_SESSION['user_family_name'] = $user["family_name"];

    // Check if the email and password match the admin credentials
    if ($emailLogin === "youssefsyblus0@gmail.com" && $passwordLogin === "aabb6000") {
        // Redirect to Admin.php if the user is an admin
        header('Location: ../Pages/HomePage/Admin.php');
        exit();
    } else {
        // Redirect to Homepage.php for other users
        header('Location: ../Pages/HomePage/Homepage.php');
        exit();
    }
} else {
    die("Invalid email or password");
}
?>
