<?php
class inventaris{
    public $connect;
    public function __construct(){
        require_once("admindb.php");
        $this->connect = new adminDb();
    }
    public function tambahInventaris($data){
        try{
            $sql = "INSERT INTO inventaris(id_inventaris,id_ruang,id_jenis,
            id_op,nama_barang,info,kuantity,kondisi, kode_inventaris) 
            VALUES(?,?,?,?,?,?,?,?,?,?)";
            
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $data[0]);
            $ins->bindparam(2, $data[1]);
            $ins->bindparam(3, $data[2]);
            $ins->bindparam(4, $data[3]);
            $ins->bindparam(5, $data[4]);
            $ins->bindparam(6, $data[5]);
            $ins->bindparam(7, $data[6]);
            $ins->bindparam(8, $data[7]);
            $ins->bindparam(9, $data[8]);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
    public function editInventaris($id){
        try{
            $sql = "SELECT * FROM inventaris WHERE id_inventaris=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function detailInventaris($id){
        try{
            $sql = "SELECT * FROM view_inventaris WHERE id_inventaris=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function getUser(){
        try{
            $sql = "SELECT * FROM user ";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    // public function getStatus(){
    //     try{
    //         $sql = "SELECT * FROM tabel_user ";
    //         $get = $this->connect->db->prepare($sql);
    //         $get->execute();
    //         return $get;
    //     }
    //     catch(PDOexception $e){
    //         return false;
    //     }
    // }
    public function getRuang(){
        try{
            $sql = "SELECT * FROM ruang";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function getJenis(){
        try{
            $sql = "SELECT * FROM jenis";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function getOperator(){
        try{
            $sql = "SELECT * FROM operator";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function updateInventaris($data){
        try{
            $sql = "UPDATE inventaris SET 
            id_ruang = ?,
            id_jenis = ?,
            id_op = ?,
            nama_barang = ?,
            info = ?,
            kuantity = ?,
            kondisi = ?,
            kode_inventaris = ?
            WHERE id_inventaris = ?";
            $upd = $this->connect->db->prepare($sql);
            $upd->bindparam(1, $data[1]);
            $upd->bindparam(2, $data[2]);
            $upd->bindparam(3, $data[3]);
            $upd->bindparam(4, $data[4]);
            $upd->bindparam(5, $data[5]);
            $upd->bindparam(6, $data[6]);
            $upd->bindparam(7, $data[7]);
            $upd->bindparam(8, $data[8]);
            $upd->bindparam(9, $data[0]);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to Update";;
        }
    }   
    
    public function bacaInventaris(){
        try{
            $sql = "SELECT * FROM view_inventaris";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }  

    // public function surat_masuk()
    // {
    //     try
    //     {
    //         $sql = "SELECT * FROM tabel_surat WHERE status = 'masuk'";
    //         $arg = $this->connect->db->prepare($sql);
    //         $arg->execute();
    //         return $arg;
    //     }
    //     catch(PDOException $e)
    //     {
    //         return false;
    //     }
    // }
    // public function surat_keluar()
    // {
    //     try
    //     {
    //         $sql = "SELECT * FROM tabel_surat WHERE status = 'keluar'";
    //         $arg = $this->connect->db->prepare($sql);
    //         $arg->execute();
    //         return $arg;
    //     }
    //     catch(PDOException $e)
    //     {
    //         return false;
    //     }
    // }

    public function deleteSurat($id){
        try{
            $sql = "DELETE FROM inventaris WHERE id_inventaris = ?";
            $del = $this->connect->db->prepare($sql);
            $del->bindparam(1, $id);
            $del->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to delete";
        }
    }

    // function generateCode($tipe)
    //     {
	// $getlastNumber = getField("SELECT kode_inventaris FROM aset_data WHERE id_tipe = '$tipe' ORDER BY SUBSTR(kode,3,3) DESC LIMIT 1");
	// $str    = (empty($getlastNumber)) ? "000" : substr($getlastNumber,2,4);
	// $incNum = str_pad($str + 1, 3, "0", STR_PAD_LEFT);
	// $tipe = ($tipe==p)?"DA":"DB";

	// return $tipe.$incNum;
    //     }

    public function getId()
    {
        try{
            $sql = "SELECT max(id_inventaris) as maxKode FROM inventaris";
            $query = $this->connect->db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
        }
    }

    public function getKi()
    {
        try{
            $sql = "SELECT max(kode_inventaris) as maxKode FROM inventaris";
            $query = $this->connect->db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
        }
    }

    public function getJumlahBarang()
    {
        try{
            $sql  = "SELECT COUNT(id_inventaris) FROM inventaris";
            $query = $this->connect->db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(PDOexeption $e){
            echo $e->getMessage();
        }
    }
}