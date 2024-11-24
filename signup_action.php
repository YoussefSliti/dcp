<?php 
    

    $name = $_POST["name"];
    $family_name = $_POST["family_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordValid = $_POST["confirm-password"];

    if(empty($name))
    {
        echo "<script>alert('name required ! enter your name')</script>";
        exit;
    }
    if(empty($family_name))
    {
        echo "<script>alert('family name required ! enter your family name')</script>";
        exit;
    }
    if(empty($email))
    {
        echo "<script>alert('email required ! enter your email')</script>";
        exit;
    }
    if(empty($password))
    {
        echo "<script>alert('passowrd required ! enter your password')</script>";
        exit;
    }
    if(empty($passwordValid))
    {
        echo "<script>alert('password confirmation required ! enter your password confirmation')</script>";
        exit;
    }
    if($password != $passwordValid)
    {
        echo "alert('password confirmation went wrong repeat again !!!')";
        exit;
    }
    if(strlen($password)< 8 )
    {
        echo "alert('password length must be > 8')";
        exit;
    }
    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password))
    {
        echo "<script>alert('Password must contain both letters and numbers.');</script>";
        exit;
    } 
    if (file_exists('../classes/PersonClass.php')) {
        include_once('../classes/PersonClass.php');
    } else {
        echo "<script>alert('PersonClass.php file not found!')</script>";
    }

    $pers = new PersonClass();
    $pers->name = $name;
    $pers->family_name = $family_name;
    $pers->email = $email;
    $pers->password = $password;

    $pers->addPerson();

    
?>