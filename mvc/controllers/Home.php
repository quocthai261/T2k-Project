<?php 
    class Home extends Controller {  
        //========= Biến
        protected $productdb ;
        protected $user = "user_lock";     

        //========= Phương thức khởi tạo
        public function __construct()
        {
            $this->productdb = $this->Model("ProductModel"); 
        }

        // Hiển thị ra màn hình trang chủ
        public function Show(){  
            if(isset($_SESSION['name']))
                $this->user = "user_login";     
            $this->View("Layout1",
                ["DB" => $this->productdb->GetProduct(),
                "Page" => "Homepage",
                "User" => $this->user
                ]);
        }
    }
?>