<?php 
class PersonClass
{
    public $name;
    public $family_name;
    public $email;
    public $password;

    function __construct()
    {
        
    }
    function addPerson()
    {
        if(file_exists('../connection_db/connexion_db.php'))
        {
            include_once('../connection_db/connexion_db.php');
        }
        else
        {
            echo "<script>alert('connexion_db.php file not found!')</script>";
        }

        $cnx = new connexion();
        
        $pdo = $cnx->Cnx();

        $req = "insert into signup (name,family_name,email,password)values (:name,:family_name,:email,:password)";
        $stmt = $pdo->prepare($req);

        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':family_name',$this->family_name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':password',$this->password);

        if($stmt->execute())
        {
            header("Location: login.html");
        }
        else
        {
            die("caught an error get back later !!!"); 
        }
    }
    function searchPerson($testEmail, $testPassword)
{
    if (file_exists('../connection_db/connexion_db.php')) {
        include_once('../connection_db/connexion_db.php');
    } else {
        die("File connexion_db.php not found!!!");
    }

    try {
        $cnx = new connexion();
        $pdo = $cnx->Cnx();
    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }
    $req = "SELECT * FROM signup WHERE LOWER(email) = LOWER(:email)";


    
    $stmt = $pdo->prepare($req);
    $stmt->bindParam(':email', $testEmail, PDO::PARAM_STR);

    
    $stmt->execute();
    
   
    if ($stmt->rowCount() > 0) {
        
        $row = $stmt->fetch();
       
        if ($row["password"] === $testPassword) {
            
            echo "Hello, " . $row["name"] . " " . $row["family_name"];
            return $row;
        } else {
            
            die("password is incorrect!!!");
            return false;
        }
    } else {
        
        die("Email is incorrect!!!");
        return false;
    }
}

}


?>