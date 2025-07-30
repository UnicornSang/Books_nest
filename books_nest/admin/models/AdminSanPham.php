<?php

class AdminSanPham
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = 'SELECT  san_pham.* , danh_muc.ten_danh_muc FROM san_pham INNER JOIN danh_muc ON san_pham.danh_muc_id=danh_muc.id';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'INSERT INTO san_pham (ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, luot_xem, ngay_nhap, mo_ta, danh_muc_id, trang_thai,hinh_anh)
            
            VALUE (:ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :luot_xem, :ngay_nhap, :mo_ta, :danh_muc_id, :trang_thai,:hinh_anh)';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':luot_xem' => $luot_xem,
                ':ngay_nhap' => $ngay_nhap,
                ':mo_ta' => $mo_ta,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':hinh_anh' => $hinh_anh,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getDetaiSanPham($id)
    {
        try {
            $sql = 'SELECT  san_pham.* , danh_muc.ten_danh_muc FROM san_pham INNER JOIN danh_muc ON san_pham.danh_muc_id=danh_muc.id WHERE san_pham.id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $luot_xem, $ngay_nhap, $mo_ta, $danh_muc_id, $trang_thai, $hinh_anh)
    {
        try {
            $sql = 'UPDATE san_pham SET 
    ten_san_pham = :ten_san_pham,
    gia_san_pham = :gia_san_pham,
    gia_khuyen_mai = :gia_khuyen_mai,
    
    so_luong = :so_luong,
    luot_xem = :luot_xem,
    ngay_nhap = :ngay_nhap,
    mo_ta = :mo_ta,
    danh_muc_id = :danh_muc_id,
    trang_thai = :trang_thai,
    hinh_anh = :hinh_anh
    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':hinh_anh' => $hinh_anh,
                ':so_luong' => $so_luong,
                ':luot_xem' => $luot_xem,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':id' => $san_pham_id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function destroySanPham($id)
    {
        try {
            $sql = 'DELETE FROM san_pham  WHERE id =:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([

                ':id' => $id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }
    public function getListAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_pham
                WHERE san_pham_id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh)
    {
        try {
            $sql = 'INSERT INTO hinh_anh_san_pham (san_pham_id, link_hinh_anh)
            
            VALUE (:san_pham_id, :link_hinh_anh)';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([

                ':san_pham_id' => $san_pham_id,
                ':link_hinh_anh' => $link_hinh_anh,

            ]);
            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function getDetaiAnhSanPham($id)
    {
        try {
            $sql = 'SELECT * FROM hinh_anh_san_pham
                WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':id' => $id,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

    public function updateAnhSanPham($id, $new_file)
    {
        try {
            $sql = 'UPDATE hinh_anh_san_pham SET 
    link_hinh_anh = :new_file,
    
    WHERE id = :id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':new_file' => $new_file,


                ':id' => $id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

     public function destroyAnhSanPham($id)
    {
        try {
            $sql = 'DELETE FROM hinh_anh_san_pham  WHERE id =:id';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute([

                ':id' => $id,

            ]);

            return true;
        } catch (Exception $e) {
            echo "lỗi" . $e->getMessage();
        }
    }

}
