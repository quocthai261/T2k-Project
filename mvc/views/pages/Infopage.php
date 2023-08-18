<h1>Thông tin khách hàng</h1>
<hr>
<?php
$obj_user = json_decode($data['DB']);
if (count($obj_user) > 0) { ?>

    <form action="" method="post">
        <div class="name-u userf">
            <h4 style="text-align: start; width: 120px;">Họ và tên: </h4>
            <!-- <span class="infu"><?= $obj_user[0]->fullname ?></span> -->
            <input type="text" style="background-color: #D6E4E5 ; border: none;" id="name" class="infu" value="<?= $obj_user[0]->fullname ?>">
        </div>
        <div class="phone-num-u userf">
            <h4 style="text-align: start; width: 120px;">Liên hệ: </h4>
            <!-- <span class="infu"><?= $obj_user[0]->user_phone ?></span> -->
            <input type="text" style="background-color: #D6E4E5 ; border: none;" id="phone" class="infu" value="<?= $obj_user[0]->user_phone ?>">

        </div>
        <div class="addr-u userf">
            <h4 style="text-align: start; width: 120px;">Địa chỉ:</h4>
            <!-- <span class="infu"><?= $obj_user[0]->user_address ?></span> -->
            <input type="text" style="background-color: #D6E4E5 ; border: none;" id="address" class="infu" value="<?= $obj_user[0]->user_address ?>">

        </div>
        <input type="hidden" id="id" value="<?= $obj_user[0]->user_id ?>">
        <button type="submit" id="btnedit" class="btn btn-primary my-4">Cập nhật</button>
    </form>
<?php } ?>

