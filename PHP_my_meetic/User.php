<?php

class User {
    private $bdd;
    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=my_meetic','root','password', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
    }
    public function getUsers()
    {
        $sql = 'SELECT * FROM users;';
        $statement = $this->bdd->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public function connectUser($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll() ;
        
        
    }
    
    
    
    
    public function subscribeUser($name, $surname, $birthdate, $sex, $city, $email, $password)
    {
        $sql = 'INSERT INTO users (name, surname, birthdate, sex, city, email, password) 
        VALUES (:name, :surname, :birthdate, :sex, :city, :email, :password);';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':surname', $surname, PDO::PARAM_STR);
        $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $statement->bindParam(':sex', $sex, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        return $statement->execute();
        //var_dump($statement->debugDumpParams());
    }
    
    public function updateUser($name, $surname, $birthdate, $sex, $city, $email, $password = "")
    {
        $sql = "UPDATE users SET name = :name, surname = :surname, birthdate = :birthdate, sex = :sex, city = :city, email = :email";
        if ($password == "") {
            $sql .= " WHERE email = :email2;";
            $statement = $this->bdd->prepare($sql);
        }
        else {
            $sql .= ", password = :password WHERE email = :email2;";
            $statement = $this->bdd->prepare($sql);
            $statement->bindParam(':password', $password, PDO::PARAM_STR);
        }
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':surname', $surname, PDO::PARAM_STR);
        $statement->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $statement->bindParam(':sex', $sex, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        session_start();
        $statement->bindParam(':email2', $_SESSION['email'], PDO::PARAM_STR);
        return $statement->execute();
    }
    
    public function searchUser($sex = "", $birthdate ="", $city = "")
    {
        $sql = "SELECT * FROM users WHERE 1";
        // var_dump($sex);
        // var_dump($birthdate);
        if ($sex != "") 
        {
            $sql .= " AND sex = :sex";
        }
        if ($city != "")
        {
            $sql .= " AND city = :city";
        }
        if($birthdate != "")
        {
            //  var_dump($birthdate);
            $sql .= " AND ROUND(DATEDIFF(CURDATE(),DATE(birthdate))/365) as 'birthdate'  BETWEEN :birthdate AND :birthdate";
        }
        $statement = $this->bdd->prepare($sql);
        if ($sex != "")
        {
            $statement->bindParam(':sex', $sex, PDO::PARAM_STR);
        }
        if ($city != "")
        {
            $statement->bindParam(':city', $city, PDO::PARAM_STR);
        }
        if($birthdate != "")
        {
            
            $statement->bindParam(':birthdate1', $birthdate[0], PDO::PARAM_STR);
            $statement->bindParam(':birthdate2', $birthdate[1], PDO::PARAM_STR);
            
        }
        //  var_dump($statement);
        
        $statement->execute();
        //   var_dump($statement);
        
        while ($donnees = $statement->fetch())
        {
            
            echo '<li class="result"><img src="img/profil.png" alt="profil empty" height="300" width="300"><p> Nom : '. $donnees['name'] .'</p><p> Prenom : '. $donnees['surname'] .'</p><p> Sex : '. $donnees['sex'] .'</p><p> Age : '. $donnees['birthdate'] ." </p><p>Ville : ". $donnees['city'] .'</p></li>';
            
        }  
        
        
        // var_dump($donnees['sex']);
        // return $statement->fetch();
        
    }
    
    
    
    public function desactivateUser( $email)
    {
        $sql = 'UPDATE users SET active = 0 WHERE email = :email;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $statement->execute();
    }
    
    public function reactivateUser( $email)
    {
        $sql = 'UPDATE users SET active = 1 WHERE email = :email;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        
        return $statement->execute();
    }
    
    public function sessionUser($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email ;';
        $statement = $this->bdd->prepare($sql);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        
        return $statement->fetch() ;
        
    }
    
    
    
}

// $newConnection = new User();
//     $newConnection->searchUser($_POST['sex'],$_POST['birthdate'],$_POST['city']);