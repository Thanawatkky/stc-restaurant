<div class="content">
    <div class="header">
        <h1>รายการสั่งอาหาร</h1>
    </div>
        <div class="col-2">
        <?php 
           
           $sql = update("SELECT tb_order.* FROM tb_order WHERE order_status = 3");
           $i = 0;
           while($fet = $sql->fetch_object()) {
               $i++;
           
               
       ?>
            <div class="card">
                <div class="card-title">
                    <h3>ออเดอร์ที่ #<?= $fet->order_id; ?></h3>
                </div>
                    <?php 
                        $sql_food = update("SELECT tb_cart.*,tb_food.* FROM tb_cart LEFT JOIN tb_food ON tb_cart.ca_product = tb_food.f_id WHERE tb_cart.order_id = '".$fet->order_id."' ");
                       
                        
                    ?>
                <div class="card-body">
                    <?php 
                         while($fet_food = $sql_food->fetch_object()) {
                            
                    ?>
                        <div>
                        <h4><?= $fet_food->f_detail; ?></h4> 
                        <p><b>รายละเอียด:</b> <?= $fet_food->f_detail; ?></p>
                        <p><b>ราคา:</b> <?= $fet_food->f_price; ?> บาท</p>
                        <p><b>จำนวน:</b> <?= $fet_food->ca_qty; ?> รายการ</p>
                        </div>
                        <?php
                      } 
                      ?>
                    </div>
                <div class="text-center" style="margin-top: 2rem;">
                    <h3 style="padding-bottom: 2rem;">รวม <?= $fet->total_price; ?> บาท</h3>
                    <h3 style="padding-bottom: 2rem;">สำเร็จแล้ว</h3>
                   
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    
</div>

