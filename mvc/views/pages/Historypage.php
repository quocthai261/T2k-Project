<h2>Lịch sử mua hàng</h2>
<hr>
<?php
$obj = json_decode($data['DB']);
if (count($obj) > 0) { ?>
    <table class="table">
        <tr>
            <th scope="col" style="padding: 5px; text-align: center;">STT</th>
            <th scope="col" style="padding: 5px; text-align: center;">Ngày đặt hàng</th>
            <th scope="col" style="padding: 5px; text-align: center;">Tổng giá trị đơn hàng</th>
            <th scope="col" style="padding: 5px; text-align: center;">Trạng thái</th>
        </tr>
        <?php $num =1 ;
         for ($i = 0; $i < count($obj); $i++) { ?>
                <tr>
                    <td scope="col" style="padding: 5px; text-align: center;"><?= $num++ ?></td>
                    <td scope="col" style="padding: 5px; text-align: center;"><?= $obj[$i]->order_date ?></td>
                    <td scope="col" style="padding: 5px; text-align: center;"><?= number_format($obj[$i]->order_price) ?>đ</td>
                    <td scope="col" style="padding: 5px; text-align: center;"><?= $obj[$i]->order_status ?></td>
                </tr>
            <?php } ?>
    </table>

<?php } else {
    echo '<h4 style =" text-align: center; ">Lịch sử mua hàng trống</h4>';
} ?>