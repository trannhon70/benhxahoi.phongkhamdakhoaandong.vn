<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

// Xử lý OPTIONS request cho CORS
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include_once('../../lib/database.php');
include_once('../../helpers/format.php');

$fm = new Format();
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Lấy slug từ query string
    $slug = isset($_GET['slug']) ? htmlspecialchars(strip_tags($_GET['slug'])) : null;

    if ($slug) {
        // Truy vấn tìm bài viết theo slug
        $query = "SELECT baiviet.*, 
            benh.name AS name_benh, 
            benh.id_khoa AS id_khoa, 
            khoa.name AS name_khoa 
            FROM admin_baiviet baiviet 
            JOIN admin_benh benh ON baiviet.id_benh = benh.id 
            JOIN admin_khoa khoa ON khoa.id = benh.id_khoa 
            WHERE baiviet.slug = '$slug' 
            LIMIT 1";
        
        $result = $db->select($query);

        if ($result && $result->num_rows > 0) {
            // Lấy bài viết đầu tiên
            $post = $result->fetch_assoc();
            echo json_encode(['status' => 'success', 'data' => $post]);
        } else {
            

            $querybenh = "SELECT * FROM admin_benh WHERE slug = '$slug' LIMIT 1";
            $resultBenh = $db->select($querybenh);
            
            if ($resultBenh && $resultBenh->num_rows > 0) {
                $benh = $resultBenh->fetch_assoc();
                $id = $benh['id'];
                
                $query = "SELECT baiviet.*, 
                          benh.name AS name_benh, 
                          benh.id_khoa AS id_khoa, 
                          khoa.name AS name_khoa 
                          FROM admin_baiviet baiviet 
                          JOIN admin_benh benh ON baiviet.id_benh = benh.id 
                          JOIN admin_khoa khoa ON khoa.id = benh.id_khoa 
                          WHERE baiviet.id_benh = '$id' 
                          ORDER BY baiviet.id DESC 
                          LIMIT 1";
                
                $result = $db->select($query);

                if ($result && $result->num_rows > 0) {
                    // Lấy bài viết theo bệnh
                    $post = $result->fetch_assoc();
                    echo json_encode(['status' => 'success', 'data' => $post]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy bài viết cho bệnh này']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Không tìm thấy bệnh với slug đã cho']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Thiếu tham số slug']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
?>
