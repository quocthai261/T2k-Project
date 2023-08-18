<!-- Content -->
<?php $obj = json_decode($data['DB']);
if (count($obj) > 0) { ?>
    <div style="margin-left: 00px;">
        <h2>Quản lý người dùng</h2>
        <span><a href="http://localhost/t2k/Admin">
                <-Quay lại </a></span>
        <div style="margin-bottom:20px ;"></div>
        <table>
            <tr>
                <th style="padding: 5px;">STT</th>
                <th style="padding: 5px;">Tên khách hàng</th>
                <th style="padding: 5px;">Username</th>
                <th style="padding: 5px;">Số điện thoại</th>
                <th style="padding: 5px;">Địa chỉ</th>
                <th style="padding: 5px;">Trạng thái</th>
                <th style="padding: 5px;">Xóa SP</th>
            </tr>
            <?php $num = 1;
            for ($i = 0; $i < count($obj); $i++) { ?>
                <tr>
                    <td style="padding: 5px;"><?= $num++ ?></td>
                    <td style="padding: 5px;"><?= $obj[$i]->fullname ?></td>
                    <td style="padding: 5px;"><?= $obj[$i]->username ?></td>
                    <td style="padding: 5px;"><?= $obj[$i]->user_phone ?></td>
                    <td style="padding: 5px;"><?= $obj[$i]->user_address ?></td>
                    <?php if ($obj[$i]->status == 0)
                        echo '<td style="padding: 5px;color:#FF4848;">Offline</td>';
                    else
                        echo '<td style="padding: 5px;color:#6FEDD6;">Online</td>';
                    ?>
                    <td><form method="post" action="http://localhost/t2k/Admin/DeleteUser">
                        <input type="hidden" name="id_user" value="<?=$obj[$i]->user_id?>">
                        <button  class="btn btndelete" name="btndele" ><i class="fa-solid fa-trash"></i></button>  <!--data-id_user = <?= $obj[$i]->user_id ?>-->
                    </form></td>
                        
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>
<link rel="stylesheet" href="/t2k/public/css/detail.css">

<Script>
     $(document).on('click','.btndelete',function() {
        var uid = $(this).data('id_user');
        $.post("http://localhost/t2k/Ajax/deleteUser",{id:uid},function(data){
            alert('Đã xóa');
            fetch-data();
        })
    });
</Script>