<?php 
class ProductModel extends DataModel {
    //======== Lấy thông tin sản phẩm
    public function GetProduct() {
        $qr = "SELECT * FROM `tbl_product`  WHERE `status`= '1' ORDER BY `product_id` ASC";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }
    
    //======== Lấy thông tin sản phẩm có giới hạn số lượng
    public function GetProductLimit($from,$iteminpage) {
        $qr = "SELECT * FROM `tbl_product` ORDER BY 'product_id' ASC LIMIT $from,$iteminpage";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Thêm sản phẩm 
    public function AddProduct($name,$image,$price) 
    {
        $qr = "INSERT INTO `tbl_product` VALUES (NULL, '$name', '$price', '4', '$image', 'dddđ', b'1', '2',NULL);";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
        $this->ReleaseMemory($qr);
    }

    //======== Xóa sản phẩm
    public function DeleteProduct($id) {
        $qr = "DELETE FROM `tbl_product` WHERE `tbl_product`.`product_id` ='$id'";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
        $this->ReleaseMemory($qr);
    }

    //======== Chỉnh sửa thông tin sản phẩm
    public function EditProduct($id,$text,$field) {
        $qr = "UPDATE `tbl_product` SET $field = '$text' WHERE `tbl_product`.`product_id` =".$id;
        $result = "false";
        if(mysqli_query($this->con, $qr)) {
            $result = "true";}
        return $result;
        $this->ReleaseMemory($qr);
    }
    
    //======== Tìm kiếm theo tên
    public function SearchName($key) {
        $qr = "SELECT * FROM `tbl_product` WHERE `product_name` LIKE '%".$key."%'";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Tìm kiếm theo ID
    public function SearchID($id) {
        $qr = "SELECT * FROM `tbl_product` WHERE `product_id` LIKE '$id'";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Tìm hình ảnh
    public function FindIMG($id) {
        $qr = "SELECT `product_img`  FROM `tbl_product` WHERE `product_id` = ".$id;
        $rows =  mysqli_query($this->con, $qr);
        while ($row = mysqli_fetch_array($rows)) {
             return $row['product_img'];
        } 
        $this->ReleaseMemory($qr);
    }
}
?> 