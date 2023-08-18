<?php 
    class Register extends Controller {   
        //======== Biến
        protected $usersdb;
        
        //======== Phương thức khởi tạo
        function __construct()
        {
            // Kết nối Model
            $this->usersdb = $this->Model("UserModel");
        }
        public function Show(){ 
            // kết nối view
            $this->View("Layout3",
                ["DB" => $this->usersdb->GetUsers(),
                 "Page" => "Registerpage"
                ]);
        }

        //======== Đăng ký
        public function Signup() {
            // // Lấy dữ liệu từ post
            if (isset($_POST["fullname"])) {
                $fullname = $_POST["fullname"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $password = password_hash($password,PASSWORD_DEFAULT);
                $phonenum = $_POST["phonenum"];
                $address = $_POST["address"];  
                $kq = false;  
               if($fullname != null && $username != null && $password != null && $phonenum != null && $address != null)
                $kq = $this->usersdb->AddUsers($fullname, $username, $password, $phonenum, $address);
                $this->View("Layout3",
                ["DB" => $this->usersdb->GetUsers(),
                 "Page" => "Loginpage",
                ]);
            }  
        }
    }
?>