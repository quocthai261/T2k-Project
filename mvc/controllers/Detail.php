<?php 
    class Detail extends Controller {   
        //======== Biến
        protected $productdb;
        protected $cartdb;

        //======== Phương thức khởi tạo
        public function __construct()
        {
            $this->productdb = $this->Model("ProductModel"); 
            $this->cartdb = $this->Model("CartModel"); 
        }

        //======== HIển thị trang chi tiết sản phẩm
        public function ShowDetail($id) {
            if (isset($_SESSION['rd_img'])) {
                $_SESSION['rd_img']= $id;
            }else 
                $_SESSION['rd_img']= $id;

            if (isset($_SESSION['user_id'])) {
                $this->View("Layout4",[
                    "DB3"=>$this->cartdb->GetCart($_SESSION['user_id']),
                    "DB2"=> $this->productdb->GetProduct(),
                    "DB" => $this->productdb -> SearchID($id),
                    "Page" => "Detailpage",
                    "rd_img" => $_SESSION['rd_img']
                ]);
            }else {
                $this->View("Layout4",[
                    "DB3"=>json_encode([]),
                    "DB2"=> $this->productdb->GetProduct(),
                    "DB" => $this->productdb -> SearchID($id),
                    "Page" => "Detailpage",
                    "rd_img" => $_SESSION['rd_img']
                ]);
            }
            
            
        }
    }
?>