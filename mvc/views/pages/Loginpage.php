<style><?php require "./public/css/login.css" ?></style>
<div class="row">
<div class="form-structor">
        <div class="login">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/527ec663096511.5aa62af79f19e.jpg" alt="">
            <h2 class="form-title" id="login">Log in</h2>
            <h6 class="form-title" style="color:#FB2576;"><?php if(isset($data['Message']))
                echo $data["Message"] ?></h6>
            <form method="post" action="http://localhost/t2k/Login/Signin" class="form-holder">
                <input type="username" name="user"  class="input-username input" placeholder="Username" autocomplete="off"/>
                <input type="password" name="pass"  class="input-pw input" placeholder="Password" autocomplete="off"/>
                <input type="submit" id="btnlogin" name="btnlogin" class="submit-btn mt-3" value="Log in">
            </form>
        </div>
        <div class="signup">
            <a href="http://localhost/t2k/Register">
            <button class="signup-btn mt-3">or <span class="log">Sign up</span></button>
        </a>
        </div>
        <div class="return">
            <a href="http://localhost/t2k/Home"><i class="fa-regular fa-circle-left"></i></a>
        </div>
    </div>
    </div>
</div>
