<?php

class Database {

    private string $_dbName = DB_NAME;
    private string $_dbUser = DB_USER;
    private string $_dbPwd = DB_PWD;

    protected function connectDB(){

        try{
                $db = new PDO('mysql:host=sql110.epizy.com;dbname='.$this->_dbName.';charset=utf8', $this->_dbUser, $this->_dbPwd);
                
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
                return $db;

        }catch(PDOException $e){

            die("Erreur PDO : ". $e->getMessage());
        }
    }
}
?>