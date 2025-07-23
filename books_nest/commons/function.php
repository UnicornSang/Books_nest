<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}

function formatDate($date) {
    // Chuyển đổi định dạng ngày từ 'Y-m-d' sang 'd/m/Y'
    return date("d/m/Y", strtotime($date));
}

// Hàm xóa session error
function deleteSessionError() {
    if(isset($_SESSION['flash'])) {
        //Hủy session sau khi đã tải trang
        unset($_SESSION['flash']);
        session_unset();
        session_destroy();
    }

    
}
