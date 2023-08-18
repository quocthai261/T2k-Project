<?php
class UserModel extends DataModel{
    //======== Lấy thông tin sản phẩm
    public function GetUsers(){
        $qr = "SELECT * FROM `tbl_user` WHERE `role` = '0'";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }

    //======== Thêm người dùng mới
    public function AddUsers($fullname, $username, $password, $phonenum, $address)
    {
        $qr = "INSERT INTO tbl_user VALUES (NULL, '$username', '$password', '$phonenum', '$address', '$fullname',b'0',b'0')";
        $result = false;
        if(mysqli_query($this->con, $qr)) {
            $result = true;
        }
        return json_encode($result);
        $this->ReleaseMemory($qr);

    }

    //======== Xóa người dùng
    public function DeleteUser($id)
    {
        $qr = "DELETE FROM tbl_user WHERE `tbl_user`.`user_id` = ".$id."";
        $result = "false";
        if(mysqli_query($this->con, $qr)) {
            $result = "true";
        }
        return $result;
        $this->ReleaseMemory($qr);

    }

    //======== Tìm kiếm người dùng theo ID
    public function SearchID($id) {
        $qr = "SELECT * FROM `tbl_user` WHERE `user_id` LIKE '$id'";
        $rows =  mysqli_query($this->con, $qr);
        $arr = array();
        while ($row = mysqli_fetch_array($rows)) {
            $arr[] = $row;
        }
        return json_encode($arr);
        $this->ReleaseMemory($qr);
    }


    //======== Kiểm tra đăng nhập
    public function LoginCheck($username,$password)
    {
        $qr = "SELECT * FROM `tbl_user` WHERE `username` LIKE '$username' AND `password` LIKE '$password'";
        $rows =  mysqli_query($this->con, $qr);
        $row = mysqli_fetch_array($rows);
        // $role = $row['role'];
        return  $row;
        $this->ReleaseMemory($qr);

    }

    //======= Kiểm tra Username
    public function CheckUsername($un) {
        $qr = "SELECT `user_id` FROM `tbl_user` WHERE `username` LIKE '$un'";
        $rows = mysqli_query($this->con, $qr);
        $kq = false;
        if( mysqli_num_rows($rows) > 0 ) {
            $kq = true;
        }
        return json_encode($kq);
        $this->ReleaseMemory($qr);

    }

    //========= Chỉnh sửa thông tin người dùng
    public function EditUser($id,$name,$phone,$address) {
        $qr = "UPDATE `tbl_user` SET `user_phone` = '$phone', `user_address` = '$address', `fullname` = '$name', `status` = b'0', `role` = b'0' WHERE `tbl_user`.`user_id` = $id";
        $result = "false";
        if(mysqli_query($this->con, $qr)) {
            $result = "true";
        }
        return $result;
        $this->ReleaseMemory($qr);
    }
}
