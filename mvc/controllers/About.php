<?php 
class About extends Controller 
{  
    public function Show(){  
        $this->View2("AboutPage",
            [
                "db" => [1]
            ]);
    }
}
?>
