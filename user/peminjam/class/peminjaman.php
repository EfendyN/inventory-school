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

    public function bacaPeminjaman2()
    {
        try{
            $sql = "SELECT * FROM peminjaman WHERE status_peminjaman='Pending' OR status_peminjaman='Dikonfirmasi'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function bacaRiwayat()
    {
        try{
            $sql = "SELECT * FROM peminjaman WHERE status_peminjaman='Dikembalikan' OR status_peminjaman='Ditolak'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
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