<?php
class AdminBinhLuan{

    private $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getBinhLuanByIdSanPham($sanPhamId){
        $sql = "SELECT * FROM binh_luan WHERE san_pham_id = ? ORDER BY ngay_dang DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$sanPhamId]);
         return $stmt->fetchAll();
    }

public function getBinhLuanById($id){
        $sql = "SELECT * FROM binh_luan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
         return $stmt->fetch();
    }
    

    public function UpdateTrangThaiBinhLuan($id,$trang_thai){
       $sql = "UPDATE binh_luan SET trang_thai = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$trang_thai,$id]);
    }

     public function deleteBinhLuan($id){
        $sql = "DELETE FROM binh_luan WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }

}



?>