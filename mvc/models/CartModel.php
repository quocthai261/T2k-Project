<?php 
class CartModel extends DataModel{
    //======== Lấy thông tin giỏ hàng theo User_id
    public function GetCart($id_user){
        $qr = "SELECT * FROM `tbl_cart` WHERE `user_id` =".$id_user;
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Thêm sản phẩm vào giỏ hàng
    public function AddItem($id_user,$id_pro, $name, $price, $quantity ,$image)
    {
        $qr = "INSERT INTO tbl_cart VALUES ('$id_user', '$id_pro ', ' $quantity ', '$name', ' $price ', ' $image')";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
        $this->ReleaseMemory($qr);

    }

    //======== Chỉnh sửa số lượng sản phẩm
    public function EditProduct($id_user,$id_pro,$text,$field) {
        $qr = "UPDATE `tbl_cart` SET $field = '$text' WHERE `tbl_cart`.`product_id` = '$id_pro' && `tbl_cart`.`user_id` = '$id_user'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;}
        return $result;
        $this->ReleaseMemory($qr);
    }

    //======== Xóa sản phẩm trong giỏ hàng
    public function DeleteCartItem($id_user,$id_pro) {
        $qr = "DELETE FROM tbl_cart WHERE `tbl_cart`.`user_id` ='$id_user' AND `tbl_cart`.`product_id` ='$id_pro'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return $result;
        $this->ReleaseMemory($qr);
    }

    //======== Kiểm tra sản phẩm có trong giỏ hàng của người dùng
    public function SearchID($uid ,$id) {
        $qr = "SELECT * FROM `tbl_cart` WHERE `product_id` = '$id' AND `user_id` = '$uid' ";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Xóa toàn bộ giỏ hàng
    public function DeleteAll($id_user) {
        $qr = "DELETE FROM tbl_cart WHERE `tbl_cart`.`user_id` ='$id_user'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return $result;
        $this->ReleaseMemory($qr);
    }
}
?>
