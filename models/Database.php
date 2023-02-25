<?php
//c'est la classe mère

//La classe Database contient une méthode connectDB qui permet de se connecter 
//à la base de données en utilisant les constantes définies dans le fichier config.php.
class Database {
//private et protected sont des modificateurs d'accès qui déterminent la visibilité des propriétés 
//et méthodes d'une classe. 

//private signifie que la propriété ou la méthode ne peut être accédée qu'à l'intérieur 
//de la classe elle-même. 

//protected signifie que la propriété ou la méthode peut être accédée à l'intérieur 
//de la classe et de toutes les classes qui héritent de celle-ci.
    private string $_dbName = DB_NAME;
    private string $_dbUser = DB_USER;
    private string $_dbPwd = DB_PWD;

    protected function connectDB(){

        try{
                $db = new PDO('mysql:host=localhost;dbname='.$this->_dbName.';charset=utf8', $this->_dbUser, $this->_dbPwd);
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
                return $db;

        }catch(PDOException $e){

            die("Erreur PDO : ". $e->getMessage());
        }
    }
}
?>