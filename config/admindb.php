<?php
class adminDb{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "bnsp_23_nico_efendy";
    public $db;

    public function __construct(){
        try{
            $this->db = new PDO("mysql:host={$this->host};
                                 dbname={$this->dbname}",
                                 $this->user,
                                 $this->pass);
        }
        catch(PDOexeption $exeption){
				die("Connection Error : ".$exeption->getMessage());
			}
    }
}

$connect = new adminDb();
?>