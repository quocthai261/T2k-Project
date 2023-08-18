<style>
    <?php require "./public/css/signup.css" ?>
</style>
<!--action="http://localhost/t2k/Register/Signup"  -->
<div class="row">
    <div class="form-structor">
        <div class="signup">
            <img src="https://www.chamathkajewellers.lk/wp-content/uploads/2022/02/Garnet.jpg" alt="">
            <h2 class="form-title" id="signup">Sign up</h2>
            <h6 class="form-text" id="type" ></h6>
            <form method="post" class="form-holder">
                <input type="text" name="fullname" id="fullname" class="input-name input" placeholder="Name" autocomplete="off" />
                <input type="text" name="phonenum" id="phonenum" class="input-phone input" placeholder="Phone number" autocomplete="off" />
                <input type="text" name="username" id="username" class="input-user input" placeholder="Username" autocomplete="off" />
                <input type="password" name="password" id="password" class="input-pw input" placeholder="Password" autocomplete="off" />
                <input type="text" name="address" id="address" class="input-address input" placeholder="Address" autocomplete="off" />
                <input class="submit-btn mt-3" type="submit" id="btnregister" value="Sign up">
            </form>
        </div>
        <div class="login">
            <a href="http://localhost/t2k/Login">
                <button class="login-btn mt-3">or <span class="log">Log in</span></button>
            </a>
        </div>
        <div class="return">
            <a href="http://localhost/t2k/Home"><i class="fa-regular fa-circle-left"></i></a>
        </div>
    </div>
</div>