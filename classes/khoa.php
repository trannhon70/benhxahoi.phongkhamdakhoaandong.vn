
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php 
  class khoa 
  {
      private $db;
      private $fm;
      public function __construct()
      {
          $this->db = new Database();
          $this->fm = new Format();
      }

      //thêm danh mục 
      public function getAllKhoa(){

        $query = "SELECT * FROM `admin_khoa` ";
        $result = $this->db->select($query);
        return $result;
        
      }

      public function getPaginationKhoas($limit, $offset) {
        $query = "SELECT * FROM admin_khoa
                  ORDER BY admin_khoa.id DESC LIMIT $limit OFFSET $offset";
    
        $result = $this->db->select($query);
        return $result;
    }

    public function getTotalCountKhoas(){
      
      $query = "SELECT COUNT(*) AS total FROM admin_khoa ";
      
      $result = $this->db->select($query);
      $row = $result->fetch_assoc();
      return $row['total'];
    }
      
      
  }
  
?>