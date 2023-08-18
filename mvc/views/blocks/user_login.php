<div class="dropdown">
    <a class="login-icon ml-3" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-user icon-nav"></i>

    </a>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <a class="dropdown-item" href="http://localhost/t2k/Info">Xin chào! <span style="color:#FFB200; font-weight:500;"><?= $_SESSION['name'] ?></span></a>
        <a class="dropdown-item" href="http://localhost/t2k/Order/History">Lịch sử mua hàng</a>
        <div class="dropdown-divider"></div>
        <form action="http://localhost/t2k/Login/Logout" method="post">
            <button class="btn ml-3" type="submit" name="btnlogout"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>Đăng xuất</button>
        </form>
    </div>
</div>