<?php 
                $sql_countMenu = update("SELECT * FROM tb_food");
                $sql_countOrder = update("SELECT * FROM tb_order WHERE order_status = 0");
                $sql_countOrderComplete = update("SELECT * FROM tb_order WHERE order_status = 3");
                $sql_countOrderPrice = update("SELECT * FROM tb_order WHERE order_status = 3");
                $num_count = ["menu" => $sql_countMenu->num_rows, "order" => $sql_countOrder->num_rows,"orderComplete" => $sql_countOrderComplete->num_rows,"orderPrice" => $sql_countOrderPrice->num_rows];
            ?>
<div class="content">
    <div class="col-4">
        <div class="card">
            <h3 class="card-title">จำนวนเมนู</h3>
          
                <p style="text-align: center;"><?= $num_count['menu']; ?></p>
            </div>
        <div class="card">
            <h3 class="card-title">ออเดอร์รอรับ</h3>
            <p style="text-align: center;"><?= $num_count['order']; ?></p>
        </div>
        <div class="card">
            
                <h3 class="card-title">ออเดอร์สำเร็จ</h3>
                <p style="text-align: center;"><?= $num_count['orderComplete']; ?></p>
           
        </div>
        <div class="card">
            
                <h3 class="card-title">ออเดอร์รอชำระเงิน</h3>
                <p style="text-align: center;"><?= $num_count['orderPrice']; ?></p>
            
        </div>
    </div>
</div>