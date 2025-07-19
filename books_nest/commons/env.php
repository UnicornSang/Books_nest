<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/books_nest/books_nest/');
define('BASE_URL_ADMIN'       , 'http://localhost/books_nest/books_nest/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'books_nest');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
