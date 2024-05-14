<?php

// ====================== PATHS ===========================
define('DS', '/');
define('ROOT_PATH', dirname(__FILE__));                        // Định nghĩa đường dẫn đến thư mục gốc
define('LIBRARY_PATH', ROOT_PATH . DS . 'libs' . DS);            // Định nghĩa đường dẫn đến thư mục thư viện
define('PUBLIC_PATH', ROOT_PATH . DS . 'public' . DS);            // Định nghĩa đường dẫn đến thư mục public							
define('APPLICATION_PATH', ROOT_PATH . DS . 'application' . DS);        // Định nghĩa đường dẫn đến thư mục public							
define('MODULE_PATH', APPLICATION_PATH  . 'module' . DS);        // Định nghĩa đường dẫn đến thư mục public							
define('BLOCK_PATH', APPLICATION_PATH  . 'block' . DS);        // Định nghĩa đường dẫn đến thư mục public							
define('TEMPLATE_PATH', PUBLIC_PATH . 'template' . DS);        // Định nghĩa đường dẫn đến thư mục public							

define('ROOT_URL', DS . 'ttn' . DS);
define('APPLICATION_URL', ROOT_URL . 'application' . DS);
define('PUBLIC_URL', ROOT_URL . 'public' . DS);
define('TEMPLATE_URL', PUBLIC_URL . 'template' . DS);

define('DEFAULT_MODULE', 'default');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_ACTION', 'index');

// ====================== DATABASE ===========================
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ttn');
define('DB_TABLE', 'group');


// ====================== DATABASE TABLE ===========================
define('TBL_GROUP', 'group');
define('TBL_USER', 'user');
define('TBL_KHOA', 'khoa');
define('TBL_LOP', 'lop');
define('TBL_SV', 'sinhvien');
define('TBL_HK', 'hocky');


// ====================== CONFIG ===========================
define('TIME_LOGIN', 3600);
