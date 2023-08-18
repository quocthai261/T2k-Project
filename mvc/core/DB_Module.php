<?php
class DataModel
{
    // Biến
    public $con; // => biến Connect
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "db_t2k";

    // protected $servername = "sql303.epizy.com";
    // protected $username = "epiz_32966073";
    // protected $password = "nxzf3b4Y4qp4eX";
    // protected $dbname = "epiz_32966073_T2K";

    // Phương thức khởi tạo
    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }

    // Giải phóng bộ nhớ
    public function ReleaseMemory($qr)
    {
        try {
            mysqli_close($this->con);
            mysqli_free_result(mysqli_query($this->con, $qr));
        } catch (TypeError $e) {
        }
    }
}
