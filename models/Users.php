<?php

class Users extends Database{
    
    public function getAllUsers()
    {
        $db = $this->connectDB();

        $query = "SELECT * FROM users";

        $statment = $db->prepare($query);
        $statment->execute();

        return $statment->fetchAll();
    }

    public function getID($mail){

        $db = $this->connectDB();

        $requete = "SELECT id FROM users WHERE mail = :mail";

        $statment = $db->prepare($requete);
        
        $statment->bindValue(":mail", $mail, PDO::PARAM_STR);

        $statment->execute();
        
        //fetch() retourne un tableau de tous les id
        $id = $statment->fetch();

        if ($id == false){
            return false;
        }

        return $id['id'];

        //return $id === false ? false : intval($id['id']);
    }

    public function getUser($id){

        $db = $this->connectDB();

        $requete = "SELECT * FROM users WHERE id = :id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":id", $id, PDO::PARAM_INT);

        $statment->execute();

        $result = $statment->fetch(); 
        
        return $result; 
    }

    public function createAccount($prenom, $nom, $email, $password){

        $db = $this->connectDB();
    
        $requete = "INSERT INTO users (prenom, nom, mail, password)
        VALUES (:prenom, :nom, :email, :password)";
    
        $statment = $db->prepare($requete);
    
        $statment->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $statment->bindValue(":nom", $nom, PDO::PARAM_STR);
        $statment->bindValue(":email", $email, PDO::PARAM_STR);
        $statment->bindValue(":password", $password, PDO::PARAM_STR);
    
        $statment->execute();
    }    
    

    public function changeInfos($id, $name, $lastname, $age, $telephone){
        
        $db = $this->connectDB();

        $requete = "UPDATE users SET prenom = :name, nom = :lastname, age = :age, 
        telephone = :telephone WHERE id = :id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":name", $name, PDO::PARAM_STR);
        $statment->bindValue(":lastname", $lastname, PDO::PARAM_STR);
        $statment->bindValue(":age", $age, PDO::PARAM_INT);
        $statment->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $statment->bindValue(":id", $id, PDO::PARAM_STR);

        $statment->execute();
    }

    public function changePassword($id, $password){
        
        $db = $this->connectDB();

        $requete = "UPDATE users SET password = :password WHERE id = :id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":password", $password, PDO::PARAM_STR);
        $statment->bindValue(":id", $id, PDO::PARAM_INT);

        $statment->execute();
    }

    /*public function userPassword($id, $password){
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $db = $this->connectDB();

        $requete = "UPDATE users SET password = :password WHERE id = :id";

        $statment = $db->prepare($requete);

        $statment->bindValue(":password", $password, PDO::PARAM_STR);
        $statment->bindValue(":id", $id, PDO::PARAM_INT);

        $statment->execute();
    }*/

}
?>