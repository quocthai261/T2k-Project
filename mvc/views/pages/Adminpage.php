<?php if (isset($_SESSION['role']) && $_SESSION['role'] == '1') { ?>
    <div class="container">
        <h1 style="color:blue; text-align: center;">Welcome to Adminpage</h1>
        <div class="row" style="border: solid 0.1px;">
            <a href="http://localhost/t2k/Admin/ShowUser" class="navbar-link">Quản lý user</a>
            <a href="http://localhost/t2k/Admin/ShowProduct" class="navbar-link">Quản lý sản phẩm</a>
            <hr>
            <form action="http://localhost/t2k/Login/Logout" method="post" >
                <button type="submit" name="btnlogout"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> Đăng xuất</button>
            </form>
            
        </div>
    </div>
<?php } else header('location:http://localhost/t2k/Login'); ?>
