<?php 

class connexion {
    public function Cnx()
    {
        $dbc = new PDO('mysql:host=localhost;dbname=dcp','root','');
        return $dbc;
    }
}

?>