<?php 
class Admin extends Controller 
{  
    //======== Biển 
       protected $productdb;
       protected $usersdb;

    //======== Phương thức khởi tạo
        public function __construct()
        {       
            $this->productdb = $this->Model("ProductModel"); 
            $this->usersdb = $this->Model("UserModel"); 
            
        }

    //======== Hiển thị trang Admin
        public function Show(){        
            // kết nối view
            $this->View("Layout3", //truyền layout
                ["DB" => $this->productdb->GetProduct(),
                "Page" => "Adminpage"
                ]);
            
        }

    //======== Hiển thị Quản lý sản phẩm
        public function ShowProduct() {
            $this->View("Layout3", //truyền layout
                ["DB" => $this->productdb->GetProduct(),
                 "Page" => "Managerpage1"
                ]);
        }


    //======== Hiển thị Quản lý người dùng
        public function ShowUser() {
            $this->View("Layout3", //truyền layout
            ["DB" => $this->usersdb->GetUsers(),
             "Page" => "Managerpage2"
            ]);
        }
    
    //======== Xóa sản người dùng
        public function DeleteUser() {
            if(isset($_POST['btndele'])){
                $id1 = $_POST['id_user'];
                $this->usersdb->DeleteUser($id1);
                header('location: http://localhost/t2k/Admin/ShowUser'); //=> chuyển đến trang quản lý người dùng
            }
        }
    }
?>
