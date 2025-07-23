<?php 

class AdminDonHang {
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();

    }
    public function getAllDonHang(){
        try{
            $sql = 'SELECT don_hang. *, trang_thai_don_hang.ten_trang_thai FROM don_hang
            InNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
            ';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
        echo "lỗi" . $e->getMessage();

    }
    }

    public function getAllTrangThaiDonHang(){
        try{
            $sql = 'SELECT  * FROM trang_thai_don_hang';
            
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        }catch(Exception $e){
        echo "lỗi" . $e->getMessage();

    }
    }

    public function detailDonHang($id_don_hang){
       $don_hang_id = $_GET['id_don_hang'];

       // lấy ra thông tin của đơn hàng tại bảng đơn hàng
       $donHang = $this->getDetailDonHang($don_hang_id);
       // lấy ra thông tin của đơn hàng tại bảng chi tiết đơn hàng
       $sanPhamDonHang = $this->getListSpDonHang($don_hang_id);
       require_once './views/donhang/detailDonHang.php';
    }
    
    public function getDetailDonHang($id){
            try{
                $sql = 'SELECT don_hang.*,
                trang_thai_don_hang.ten_trang_thai, 
                tai_khoan.ho_ten, tai_khoan.email, tai_khoan.so_dien_thoai, 
                phuong_thuc_thanh_toan.ten_phuong_thuc
                from don_hang
                INNER JOIN trang_thai_don_hang ON don_hang.trang_thai_id = trang_thai_don_hang.id
                INNER JOIN tai_khoan ON don_hang.tai_khoan_id = tai_khoan.id
                INNER JOIN phuong_thuc_thanh_toan ON don_hang.phuong_thuc_thanh_toan_id = phuong_thuc_thanh_toan.id
                WHERE don_hang.id = :id';
                
                $stmt = $this->conn->prepare($sql);

                $stmt->execute([
                    ':id' => $id,
                
                ]);

                return $stmt->fetch();
            }catch(Exception $e){
            echo "lỗi" . $e->getMessage();

    }
    }
    
    public function getListSpDonHang($id){
            try{
                $sql = 'SELECT chi_tiet_don_hang.*, san_pham.ten_san_pham 
                
                from chi_tiet_don_hang
                INNER JOIN san_pham ON chi_tiet_don_hang.san_pham_id = san_pham.id
                WHERE chi_tiet_don_hang.don_hang_id = :id';
                
                $stmt = $this->conn->prepare($sql);

                $stmt->execute([
                    ':id' => $id,
                
                ]);

                return $stmt->fetchAll();
            }catch(Exception $e){
            echo "lỗi" . $e->getMessage();

    }
    }
    
    public function updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_id){
        try{
            $sql = 'UPDATE don_hang SET 
            ten_nguoi_nhan = :ten_nguoi_nhan,
            sdt_nguoi_nhan = :sdt_nguoi_nhan,
            email_nguoi_nhan = :email_nguoi_nhan,
            dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
            ghi_chu = :ghi_chu, 
            trang_thai_id = :trang_thai_id
            
            WHERE id = :id';
            
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,    
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu,
                ':trang_thai_id' => $trang_thai_id,
                ':id' => $id
            
            ]);

            return true;
        }catch(Exception $e){
        echo "lỗi" . $e->getMessage();

    }
    }
}
        
?>  