<?php 
class OrderModel extends DataModel{
    //======== Lấy dữ liệu đơn hàng
    public function GetOrder($id){
        $qr = "SELECT * FROM `tbl_order` WHERE `tbl_order`.`user_id` = $id";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Thêm vào đơn hàng
    public function AddItem($user_id,$date,$status,$price)
    {
        $qr = "INSERT INTO `tbl_order`  VALUES (NULL,  '$date', '$status','$price','$user_id');";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
        $this->ReleaseMemory($qr);
    }
}
?>
