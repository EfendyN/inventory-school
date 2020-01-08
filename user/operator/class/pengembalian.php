<?php
class pengembalian{
    public $connect;
    public function __construct(){
        require_once("admindb.php");
        $this->connect = new adminDb();
    }

    public function bacaPengembalian()
    {
        try{
            $sql = "SELECT * FROM peminjaman WHERE status_peminjaman='Dikembalikan'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }

}