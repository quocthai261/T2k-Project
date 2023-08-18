<?php 
    class Product extends Controller {   
        //========= Biến
        protected $productdb;
        protected $user = "user_lock";

        //========= 
        public function __construct()
        {
            $this->productdb = $this->Model("ProductModel"); 
        }

        //======= Hiển thị trang sản phẩm
        public function Show() {
            $current_page =!empty($_POST['page'])?$_POST['page']:1;
            $item_in_page = 12;
            $from = ($current_page - 1) * $item_in_page;
            //============
            $user = "user_lock";     
            if(isset($_SESSION['name']))
               $this->user = "user_login";
            $this->View("Layout1",[
                "DB" => $this->productdb -> GetProductLimit($from,$item_in_page),
                "Page" => "Productpage",
                "User" => $this->user
            ]);
        }

        //======= Tìm kiếm sản phẩm
        public function Search() {
            if (isset($_POST["btn_search"])) {
                if(isset($_SESSION['name']))
                    $this->user = "user_login";
                if($_POST["keyword"] != null ) {
                    $this->View("Layout1", //truyền layout
                    ["DB" =>$this->productdb->SearchName($_POST["keyword"])  ,
                    "Key" => $_POST["keyword"],
                    "Page" => "Productpage",
                    "User" => $this->user
                    
                    ]);
                }else 
                    $this->Show();      
            }
        }

        //======== Xu hướng tìm kiếm
        public function SearchByKey($key) {
            $this->View("Layout1", //truyền layout
            ["DB" =>$this->productdb->SearchName($key)  ,
            "Key" => $key,
            "Page" => "Productpage",
            "User" => $this->user
        ]);
        }
        
        //======== Bộ lọc
        public function Filter() {
            if (isset($_POST["rd_material"])) {
                echo "yes";
            }
        }

        //======== Xóa sản phẩm
        function DeleteProduct() {
            if(isset($_POST['btndelete'])){
                $id =$_POST['id_pro'];
                $this->productdb->DeleteProduct($id);
                header('location:http://localhost/t2k/Admin/ShowProduct');
            }
        }
    }
?>