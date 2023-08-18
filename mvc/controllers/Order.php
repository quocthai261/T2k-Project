<?php
class Order extends Controller
{
    //======== Biến
    protected $userdb;
    protected $cartdb;
    protected $orderdb;

    //======== Phương thức khởi tạo
    public function __construct()
    {
        $this->userdb = $this->Model("UserModel");
        $this->cartdb = $this->Model("CartModel");
        $this->orderdb = $this->Model("OrderModel");
    }

    //======== Hiển thị đơn hàng    
    public function Show() {
        $this->View("Layout2",[
            "DB_user" => $this->userdb->SearchID($_SESSION['user_id']),
            "DB_cart" => $this->cartdb->GetCart($_SESSION['user_id']),
            "Page" => "Orderpage"
        ]);
    }

    //========= Hiển thị lịch sử mua hàng
    public function History() {
        $this->View("Layout2",[
            "DB" => $this->orderdb->GetOrder($_SESSION['user_id']),
            "Page" => "Historypage"
        ]);
    }
}
?>
