<?php
class peminjaman{
    public $connect;
    public function __construct(){
        require_once("admindb.php");
        $this->connect = new adminDb();
    }

    public function bacaPeminjaman()
    {
        try{
            $sql = "SELECT * FROM peminjaman";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function editPeminjaman($id){
        try{
            $sql = "SELECT * FROM peminjaman WHERE id_peminjaman=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function updateStatus($data,$id){
        try{
            $sql = "UPDATE peminjaman SET 
            status_peminjaman = ?
            WHERE id_peminjaman = ?";
            $upd = $this->connect->db->prepare($sql);
            $upd->bindparam(1, $data[0]);
            $upd->bindparam(2, $id);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to Update";;
        }
    }

    public function getIdPeminjaman()
    {
        try{
            $sql = "SELECT max(id_peminjaman) as maxKode FROM peminjaman";
            $query = $this->connect->db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
        }
    }

    public function getIdUser()
    {
        try{
            $sql = "SELECT max(id_user) as maxKode FROM user";
            $query = $this->connect->db->prepare($sql);
            $query->execute();
            return $query;
        }
        catch(PDOexception $e){
            echo $e->getMessage();
        }
    }

    public function getPeminjam(){
        try{
            $sql = "SELECT * FROM peminjaman";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function getNamaLevel(){
        try{
            $sql = "SELECT nama_level FROM view_detail_user WHERE nama_level= 'peminjam'";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function tambahUser($dataUser){
        try{
            $sql = "INSERT INTO user(id_user,id_level,username,
            password,email) 
            VALUES(?,?,?,?,?)";
            
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $data[0]);
            $ins->bindparam(2, $data[1]);
            $ins->bindparam(3, $data[2]);
            $ins->bindparam(4, $data[3]);
            $ins->bindparam(5, $data[4]);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }

    public function tambahPeminjaman($dataPeminjaman){
        try{
            $sql = "INSERT INTO peminjaman(id_peminjaman,tanggal_peminjaman,tanggal_pengembalian,
            status_peminjaman,id_peminjam) 
            VALUES(?,?,?,?,?)";
            
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $dataPeminjaman[0]);
            $ins->bindparam(2, $dataPeminjaman[1]);
            $ins->bindparam(3, $dataPeminjaman[2]);
            $ins->bindparam(4, $dataPeminjaman[3]);
            $ins->bindparam(5, $dataPeminjaman[4]);
            $ins->execute();

            $sqlmax = "SELECT max(id_peminjaman) as max FROM peminjaman";
            $query = $this->connect->db->prepare($sqlmax);
            $query->execute();
            $max = $query->fetch(PDO::FETCH_OBJ);

            foreach($_SESSION['cart'] as $i){
                $sql2 = "INSERT INTO detail_peminjaman(id_inventaris,id_peminjaman,kuantity)
                VALUES(?,?,?)";
                $det = $this->connect->db->prepare($sql2);
                $det->bindparam(1, $i);
                $det->bindparam(2, $max->max);
                $det->bindparam(3, $dataPeminjaman[5]);
                $det->execute();
            }

            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
}