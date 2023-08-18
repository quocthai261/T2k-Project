<?php 
    class Login extends Controller {
        //======== Biến
        protected $usersdb;

        //======== Phương thức khởi tạo
        public function __construct()
        {
            // Kết nối Model
            $this->usersdb = $this->Model("UserModel");
            if (isset($_POST['btn_login'])) {echo "sayyes";}
        }

        //======= Hiển thị form Login
        public function Show() {
            $this->View("Layout3",[
                "Page" => "Loginpage"
                //"Page" => "testLogin"
            ]);
        }

        //======== Kiểm tra đăng nhập
        public function Signin() {
            if (isset($_POST['btnlogin'])) 
            {
               $username = $_POST['user'] ;
               $password = $_POST['pass'] ;
               $password = md5($password);
               if($username != null || $password != null) {
                $kq = $this->usersdb->LoginCheck($username,$password);
                if(isset($kq['role'])) {
                    $_SESSION['role'] = $kq['role'];
                    if($kq['role'] == '1') 
                        header('location: http://localhost/t2k/Admin');
                    else {
                        $_SESSION['name'] = $kq['fullname'];
                        $_SESSION['user_id'] = $kq['user_id'];
                        header('location: http://localhost/t2k/Cart');
                    }
                }else 
                    $mes = "Tài khoản hoặc mật khẩu không đúng!";
                    $this->View("Layout3",[
                        "Page" => "Loginpage",
                        "Message" => $mes
                    ]);
               }
            }
        }

        //======== Đăng xuất 
        public function Logout() {
            if (isset($_POST['btnlogout'])) {
                unset ($_SESSION['role']);
                unset ($_SESSION['name']);
                unset ($_SESSION['user_id']);
                header('location:http://localhost/t2k/Home');
            }
        }

        public function Forgotpass() {
            if (isset($_POST['user_forgot'])) 
                echo $_POST['user_forgot'];
        }
    }
?>