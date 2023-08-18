<?php 
class Info extends Controller {
    //======== Biến
    protected $userdb;

    //======== Phương thức khởi tạo 
    public function __construct()
    {
        $this->userdb = $this->Model("UserModel");;
    }

    //======== Hiển thị thông tin khách hàng
    public function Show() 
    {
        $this->View("Layout2",[
            "DB" => $this->userdb->SearchID($_SESSION['user_id']),
            "Page" => "Infopage"
        ]);
    }
}
?>