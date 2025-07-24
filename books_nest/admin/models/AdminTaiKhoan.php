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
public function insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id){
        try {
            $sql = 'INSERT INTO tai_khoan (ho_ten, email, mat_khau,chuc_vu_id)   
            VALUES (:ho_ten, :email, :password, :chuc_vu_id)';
            
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([

                ':ho_ten'=>$ho_ten,
                ':email'=>$email,
                ':password'=>$password,
                ':chuc_vu_id'=>$chuc_vu_id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    
}







?>