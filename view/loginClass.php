<?php
class Validations
{
    public $connect;
    public function __construct(){
        require_once("../config/admindb.php");
        $this->connect = new adminDb();
    }
    public function Login($username, $password)
    {
        try {
            $sql = "SELECT id_user, nama_level FROM view_user WHERE username = ? AND password = ?";
            $login = $this->connect->db->prepare($sql);
            $login->bindParam(1, $username);
            $login->bindParam(2, $password);
            $login->execute();  
            if ($login->rowCount() > 0) {
                return $login->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
            
        } 
        catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function getUser($id)
    {
        try {
            $sql = "SELECT * FROM user WHERE id_user = ?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            
            if ($get->rowCount() > 0) {
                return $get->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        } 
        
    }   
}