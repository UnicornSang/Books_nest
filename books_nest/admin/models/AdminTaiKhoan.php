<?php


class AdminTaiKhoan{
 public $conn;

    public function __construct()
    {
        $this->conn = connectDB();

    }
    public function getAllTaiKhoan($chuc_vu_id){
        try{
            $sql = 'SELECT * FROM tai_khoan WHERE chuc_vu_id = :chuc_vu_id ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([':chuc_vu_id'=>$chuc_vu_id]);

            return $stmt->fetchAll();
        }catch(Exception $e){
        echo "lỗi" . $e->getMessage();

    }
    }

    
}







?>