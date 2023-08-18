<?php 
    class Controller{
        //=========== Model 
        public function Model($model) {
            require_once "mvc/models/".$model.".php";
            return new $model;
        }
        //=========== Views
        public function View($view,$data = []) {
            require_once "mvc/views/".$view.".php";
        }

         //=========== Views
         public function View2($view,$data = []) {
            require_once "mvc/views/pages/".$view.".php";
        }
    }
?>