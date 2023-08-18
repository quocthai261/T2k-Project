<?php
class Cart extends Controller
{
    //======= Biến
    protected $check = false;
    protected $cartdb;
    protected $productdb;
    protected $user = "user_lock";
    
    //======== Phương thức khởi tạo
    public function __construct()
    {
        if (isset($_SESSION['name']) && isset($_SESSION['user_id']) ) {
            $this->check = true;
            $this->cartdb = $this->Model("CartModel");
            $this->productdb = $this->Model("ProductModel");
        } else header('location:http://localhost/t2k/Login');
    }

    //========= Hiển thị màn hình Product
    public function Show()
    {
        if($this->check == true) {
        $this->View("Layout2", [
            "DB" => $this->cartdb->GetCart($_SESSION['user_id']),
           "Page" => "Cartpage"
           // "Page" => "Carttest"

        ]);}
    }


    //========= Thêm sản phẩm vào giỏ hàng
    public function Addtocart($id,$name,$price) 
    {
        //Xử lý ID
        $checkid = 'true';
        $id_user = $_SESSION['user_id'];
        $row =  $this->cartdb->SearchID($id_user,$id);
        $obj = json_decode($row);
        $quantity = 1;
        $img = $this->productdb->FindIMG($id);
        if( count($obj) > 0)
            {
                $checkid = 'false';
                $quantity = $obj[0]->product_quantity;
            }
            echo $checkid;
        if($checkid == 'true') { 
            $this->cartdb->AddItem($id_user,$id, $name, $price, $quantity ,$img);
            header('location:http://localhost/t2k/Cart');
        } else {
            $quantity += 1;
            $this->cartdb->EditProduct($id_user,$id,$quantity,"product_quantity");
            header('location:http://localhost/t2k/Cart');
        }
    }

    //========== Xóa sản phẩm trong giỏ
    public function DeleteCartItem() {
        if(isset($_POST['btnhello'])){
            $id1 = $_POST['id_user'];
            $id2 =$_POST['id_pro'];
            $this->cartdb->DeleteCartItem($id1,$id2);
            header('location:http://localhost/t2k/Cart');
        }
    }

    //========= Xóa giỏ hàng
    public function DeleteCart()
    {
        $id_user = $_SESSION['user_id'];
        $this-> cartdb -> DeleteAll($id_user);
        header('location:http://localhost/t2k/Cart');

        
    }
}
