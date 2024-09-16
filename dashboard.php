
<div class="content">
    <div class="header">
        <h1>เลือกรายการอาหาร</h1>
    </div>
        <div class="col-4">
            <?php 
           
                $sql = update("SELECT * FROM tb_food");
                $i = 0;
                while($fet = $sql->fetch_object()) {
                    $i++;
                
            ?>
            <div class="card">
                <div class="card-title">
                    <h3><?= $fet->f_name; ?></h3>
                </div>
                <hr>
                <div class="card-body">
                  <p><b>รายละเอียด:</b> <?= $fet->f_detail; ?></p>
                  <p style="text-align: center;"><b>ราคา:</b> <?= $fet->f_price; ?> บาท</p>
                </div>
                <div class="text-center">  
                    <a href="index.php?p=food_detail&f_id=<?= $fet->f_id; ?>" class="btn-dark">ดูรายละเอียด</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
