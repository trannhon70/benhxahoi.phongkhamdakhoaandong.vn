
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/session.php');
?>

<?php
function validatePhoneNumber($phoneNumber)
{
    $pattern = "/^[0-9]{10}$/";
    if (preg_match($pattern, $phoneNumber)) {
        return true;
    } else {
        return false;
    }
}

function validateDateOfBirth($dateOfBirth)
{
    $pattern = "/^([0-2][0-9]|(3)[0-1])\/(((0)[0-9])|((1)[0-2]))\/\d{4}$/";
    return preg_match($pattern, $dateOfBirth) ? true : false;
}

function formatTime($time)
{
    // Chuyển đổi thành số nguyên
    $time = intval($time);
    // Đảm bảo rằng giờ luôn có 2 chữ số
    if ($time < 10) {
        return "0" . $time;
    }
    return strval($time);
}

class KhachHang
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    //thêm danh mục 
    public function createKhachHang($data, $nguon)
    {
        $hoten = mysqli_real_escape_string($this->db->link, $data['hoten']);
        $ngaysinh = mysqli_real_escape_string($this->db->link, $data['ngaysinh']);
        $sdt = mysqli_real_escape_string($this->db->link, $data['sdt']);
        $trieuchung = mysqli_real_escape_string($this->db->link, $data['trieuchung']);
        $ngaykham = mysqli_real_escape_string($this->db->link, $data['ngaykham']);
        $giokham = mysqli_real_escape_string($this->db->link, $data['giokham']);
        $created_at = $this->fm->created_at();

        if ($hoten !== '' && $ngaysinh !== '' && $sdt !== '' && $trieuchung !== '' && $ngaykham !== '' && $giokham !== '') {

            if (validatePhoneNumber($sdt) === false) {
                return array('status' => 'error', 'message' => 'Số điện thoại không hợp lệ!');
            }
            $query = "INSERT INTO admin_khachhang (hoten,ngaysinh,sdt,trieuchung,ngaykham,giokham,status, note, ketqua, nguon,user_tuvan,created_at) VALUE('$hoten','$ngaysinh','$sdt','$trieuchung','$ngaykham','$giokham',0,'','',' $nguon','','$created_at') ";
            $result = $this->db->insert($query);
            if ($result) {
                return array('status' => 'success', 'message' => 'Cảm ơn quý khách đã để lại thông tin, chúng tôi sẽ liên hệ với khách hàng trong thời sớm nhất!');
            }
        } else {
            return array('status' => 'error', 'message' => 'Tất cả các nội dung không được bổ trống!');
        }
    }

    public function getPaginationLichKham($limit, $offset)
    {
        $query = "SELECT kh.*, user.user_name 
              FROM admin_khachhang kh
              LEFT JOIN admin_user user ON kh.user_tuvan = user.id
              ORDER BY kh.id DESC LIMIT $limit OFFSET $offset";
        $result = $this->db->select($query);
        return $result;
    }

    public function getTotalCount()
    {
        $query = "SELECT COUNT(*) AS total FROM admin_khachhang ";
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function getPaginationLichKhamByNgayKham($limit, $offset, $startDate, $endDate, $sdt, $hoten, $form)
    {
        $sdt = mysqli_real_escape_string($this->db->link, $sdt);
        $sdt = ltrim($sdt, '0');
        $hoten = mysqli_real_escape_string($this->db->link, $hoten);
        $form = mysqli_real_escape_string($this->db->link, $form);
        $query = "SELECT khachHang.*, user.user_name 
                  FROM admin_khachhang khachHang
                  LEFT JOIN admin_user user ON khachHang.user_tuvan = user.id
                  WHERE 1=1"; // 1=1 để dễ dàng thêm điều kiện vào sau này
        
        if ($sdt) {
            $query .= " AND khachHang.sdt LIKE '%$sdt%'";
        }

        if ($hoten) {
            $query .= " AND khachHang.hoten LIKE '%$hoten%'";
        }

        if ($form) {
            $query .= " AND khachHang.form LIKE '%$form%'";
        }
        
        if ($startDate && $endDate) {
            $startDate = DateTime::createFromFormat('d/m/Y', $startDate);
            $endDate = DateTime::createFromFormat('d/m/Y', $endDate);
    
            if ($startDate && $endDate) {
                $format_startDate = $startDate->format('Y-m-d');
                $format_endDate = $endDate->format('Y-m-d');
                $query .= " AND DATE(khachHang.ngaykham) BETWEEN '$format_startDate' AND '$format_endDate'";
            }
        }
        
        $query .= " ORDER BY khachHang.id DESC 
                    LIMIT $limit OFFSET $offset";
        
        $result = $this->db->select($query);
        return $result;
    }

    public function getTotalCountByNgayKham($startDate, $endDate, $sdt, $hoten, $form)
    {
        $sdt = mysqli_real_escape_string($this->db->link, $sdt);
        $hoten = mysqli_real_escape_string($this->db->link, $hoten);
        $form = mysqli_real_escape_string($this->db->link, $form);
        $query = "SELECT COUNT(*) AS total 
                  FROM admin_khachhang 
                  WHERE 1=1"; // Sử dụng 1=1 để dễ dàng thêm điều kiện
    
        // Kiểm tra và thêm điều kiện ngày tháng
        if (!empty($startDate) && !empty($endDate)) {
            $startDateObj = DateTime::createFromFormat('d/m/Y', $startDate);
            $endDateObj = DateTime::createFromFormat('d/m/Y', $endDate);
    
            if ($startDateObj && $endDateObj) {
                $format_startDate = $startDateObj->format('Y-m-d');
                $format_endDate = $endDateObj->format('Y-m-d');
                $query .= " AND DATE(ngaykham) BETWEEN '$format_startDate' AND '$format_endDate'";
            }
        } elseif (!empty($startDate)) {
            $startDateObj = DateTime::createFromFormat('d/m/Y', $startDate);
            if ($startDateObj) {
                $format_startDate = $startDateObj->format('Y-m-d');
                $query .= " AND DATE(ngaykham) >= '$format_startDate'";
            }
        } elseif (!empty($endDate)) {
            $endDateObj = DateTime::createFromFormat('d/m/Y', $endDate);
            if ($endDateObj) {
                $format_endDate = $endDateObj->format('Y-m-d');
                $query .= " AND DATE(ngaykham) <= '$format_endDate'";
            }
        }
    
        // Kiểm tra và thêm điều kiện số điện thoại
        if (!empty($sdt)) {
            $query .= " AND sdt LIKE '%$sdt%'";
        }

        if (!empty($hoten)) {
            $query .= " AND hoten LIKE '%$hoten%'";
        }

        if (!empty($form)) {
            $query .= " AND form LIKE '%$form%'";
        }
    
        // Thực thi truy vấn và trả về kết quả
        $result = $this->db->select($query);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0; // Trường hợp không có kết quả nào
        }
    }
    

    public function getByIdLichKham($id)
    {
        $query = " SELECT * FROM admin_khachhang WHERE id = '$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result->fetch_assoc();
    }

    public function getAllSelectKQ()
    {
        $query = " SELECT * FROM admin_select_kq ";
        $result = $this->db->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function UpdateKhachHang($data, $id)
    {
        $status = mysqli_real_escape_string($this->db->link, $data['status']);
        $note = mysqli_real_escape_string($this->db->link, $data['note']);
        $ketqua = mysqli_real_escape_string($this->db->link, $data['ketqua']);
        $mahen = mysqli_real_escape_string($this->db->link, $data['mahen']);
        $user_tuvan = Session::get('id');

        if ($id !== '') {
            $query = "UPDATE admin_khachhang SET 
             status = '$status' ,
             note = '$note' ,
             ketqua = '$ketqua',
             user_tuvan = '$user_tuvan',
             mahen = '$mahen'
             WHERE id = '$id'";
            $result = $this->db->update($query);
            if ($result) {
                return array('status' => 'success', 'message' => 'Cập nhật thành công!');
            } else {
                return array('status' => 'error', 'message' => 'Cập nhật không thất bại!');
            }
        }
    }

    public function delete_khachHang($id)
    {
        $query = "DELETE FROM `admin_khachhang` WHERE id = '$id' LIMIT 1";
        $result = $this->db->delete($query);

        if ($result) {
            return array('status' => 'success', 'message' => 'Thông tin khách hàng xóa thành công!');
        } else {
            return array('status' => 'error', 'message' => 'Thông tin khách hàng xóa không thất bại!');
        }
    }
}

?>