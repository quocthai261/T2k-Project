<?php
class Ajax extends Controller
{
    //======== Biến
    protected $userdb;
    protected $productdb;
    protected $cartdb;
    protected $orderdb;

    //======== Phương thức khởi tạo
    public function __construct()
    {
        $this->userdb = $this->Model("UserModel");
        $this->productdb = $this->Model("ProductModel");
        $this->cartdb = $this->Model("CartModel");
        $this->orderdb = $this->Model("OrderModel");
    }

    //======== Kiểm tra Username
    public function checkUsername()
    {
        $un = $_POST["un"];
        $kq = $this->userdb->CheckUsername($un);
        if ($kq == 'true') echo  "<font color = '#E97777'>Tài khoản đã tồn tại</font>";
        else echo "<font color = '#00ABB3'>Tài khoản hợp lệ</font>";
    }

    //======== Thêm người dùng bằng Ajax (đăng ký)
    public function addUser()
    {
        if (isset($_POST["fullname"])) {
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $password = md5($password);
            $phonenum = $_POST["phonenum"];
            $address = $_POST["address"];
            echo $kq = $this->userdb->AddUsers($fullname, $username, $password, $phonenum, $address);
            header('location:http://localhost/t2k/Product/Home');
        }
    }

    //======== Load dữ liệu bằng Ajax
    public function LoadDB()
    {
        $output = '';
        $result = $this->productdb->GetProduct();
        $obj = json_decode($result);
        $output .= '
        <table class= "table table-bordered">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Quản lý</th>
            </tr>
        ';
        if (count($obj) > 0) {
            $num = 1;
            for ($i = 0; $i < count($obj); $i++) {
                $output .= '
                <tr>
                    <td>' . $num++ . '</td>
                    <td class ="productname" data-id_pro2 = ' . $obj[$i]->product_id . '   contenteditable>' . $obj[$i]->product_name . '</td>
                    <td><img style="height:100px; width:100px;" src=" ' . $obj[$i]->product_img . '" alt=""></td>
                    <td class ="productprice" data-id_pro3 = ' . $obj[$i]->product_id . '   contenteditable>' . number_format($obj[$i]->product_price) . '</td>
                    <td><form method="post" action="http://localhost/t2k/Product/DeleteProduct">
                        <input type="hidden" name="id_pro" value="' . $obj[$i]->product_id . '">
                        <button type="submit" name="btndelete"  class="btn btn_delete"><i class="fa-solid fa-trash"></i></button>
                    </form>
                    </td>
                </tr>
                ';
            }
        } else {
            $output .= '    
            <tr>
                <td colspan="5">Không có dữ liệu</td>
            </tr>
            ';
        }
        $output .= '</table>';

        echo $output;
    }

    //======== Thêm sản phẩm bằng Ajax
    public function addProduct()
    {
        if (isset($_POST['name'])) {
            $name = $_POST["name"];
            $image = $_POST["image"];
            $price = $_POST["price"];
            echo $kq = $this->productdb->AddProduct($name, $image, $price);
        }
    }

    //========= Xóa sản phẩm bằng Ajax
    public function deleteProduct()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            echo $kq = $this->productdb->DeleteProduct($id);
        }
    }

    //========= Xóa người dùng bằng Ajax
    public function deleteUser()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            echo $kq = $this->userdb->DeleteUser($id);
        }
    }

    //========= Thêm giỏ hàng vào giỏ bằng Ajax
    public function addtoCart()
    {
        if (isset($_SESSION['name'])) {
            if (isset($_POST['id_user'])) {
                // Lấy dữ liệu post
                $id_user = $_POST['id_user'];
                $id_pro = $_POST['id_pro'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $image = $_POST['image'];
                // Kiểm tra 
                $checkid = 'true';
                $row =  $this->cartdb->SearchID($id_user, $id_pro);
                $obj = json_decode($row);
                if (count($obj) > 0) {
                    $checkid = 'false';
                    $quantity1 = $obj[0]->product_quantity;
                }
                if ($checkid == 'true') {
                    $this->cartdb->AddItem($id_user, $id_pro, $name, $price, $quantity, $image);
                } else {
                    $quantity += $quantity1;
                    $this->cartdb->EditProduct($id_user, $id_pro, $quantity, "product_quantity");
                }
            }
        }else header ('location:http://localhost/t2k/Product/Login'); 
    }

    //======== Chỉnh sửa sản phẩm bằng Ajax
    public function editProduct()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $text = $_POST['text'];
            $field = $_POST['field'];

            echo $kq = $this->productdb->EditProduct($id, $text, $field);
            header('location:http://localhost/t2k/Admin/ShowProduct');
        }
    }

    //======== Chinh sửa số lượng sản phẩm bằng Ajax
    public function editQuantity()
    {
        if (isset($_POST['id_user'])) {
            $id_user = $_POST['id_user'];
            $id_pro = $_POST['id_pro'];
            $text = $_POST['text'];
            $field = $_POST['field'];
            echo $kq = $this->cartdb->EditProduct($id_user, $id_pro, $text, $field);
            header('location:http://localhost/t2k/Cart');
        }
    }

    //========= Xóa giỏ hàng bằng Ajax
    public function deleteallCart()
    {
        if (isset($_POST['invoke'])) {
            $id_user = $_POST['id_us'];
            $this->cartdb->DeleteAll($id_user);
            echo $kq = "Thanh toán thành công";
        }
    }

    //======== Thêm đơn hàng bằng Ajax
    public function addOrder()
    {
        if (isset($_POST['invoke'])) {
            $id_user = $_POST['id_us'];
            date_default_timezone_set("Asia/Bangkok");
            $date = date('Y-m-d');
            $status = "Đã thanh toán";
            $price = $_POST['price'];
            echo $kq = $this->orderdb->AddItem($id_user, $date, $status, $price);
        }
    }

    //========= Chỉnh sửa thông tin người dùng bằng Ajax
    public function editUser()
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $id = $_POST['id'];
            echo $kq = $this->userdb->EditUser($id, $name, $phone, $address);
        }
    }
}
