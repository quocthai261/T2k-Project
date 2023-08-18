<?php 
    class App {
        // Biến
        protected $controller="Home";
        protected $action="Show";
        protected $params=[];

        // Phương thức khởi tạo
        function __construct(){
            $arr = $this->UrlProcess(); // => Hàm xữ lý URL (Controller/Action/Param)

            //=========== Controller
            if ( $arr != null && file_exists("mvc/controllers/".$arr[0].".php"))
            {
                $this->controller = $arr[0];
                unset ($arr[0]);
            }
            require_once "mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;

            //=========== Action
            if (isset($arr[1])) {
                if (method_exists($this->controller , $arr[1])){
                    $this->action = $arr[1];
                }
                unset ($arr[1]);
            }

            //=========== Param
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller,$this->action],$this->params);
        } 
        
        // Hàm xữ lý URL
        function UrlProcess(){
            if( isset($_GET["url"]) ){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>