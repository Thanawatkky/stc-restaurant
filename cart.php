<div class="content">
    <div class="header">
        <h1>ตะกร้าสินค้า</h1>
    </div>
        <div class="col-1" style="margin: 0 auto;">
            <div class="card">
            <?php 
           
                $sql = update("SELECT tb_food.f_id, tb_food.f_name, tb_food.f_detail, tb_food.f_price,tb_cart.* FROM tb_cart LEFT JOIN tb_food ON tb_cart.ca_product = tb_food.f_id WHERE ca_user = '".$_SESSION['user_id']."' AND ISNULL(tb_cart.order_id) ");
                $i = 0;
                $sum_total = 0;
                while($fet = $sql->fetch_object()) {
                    $i++;
                    $sum_price = $fet->f_price * $fet->ca_qty;
            ?>
                <div class="card-title" style="text-align: start; margin-top: 1rem;">
                    <h3><?= $fet->f_name; ?></h3>
                </div>
                <div class="card-body" style="padding-top: 0;">
                  <p><b>รายละเอียด:</b> <?= $fet->f_detail; ?></p>
                  <p><b>ราคา:</b> <?= $fet->f_price; ?> บาท</p>
                  <p><b>จำนวน:</b> <?= $fet->ca_qty; ?> รายการ</p>
                  <br>
                  <h3><b>รวม:</b> <?= $sum_price; ?> บาท</h3>
                 <div class="text-center" style="text-align: end;">
                    <button type="button" class="btn-red" onclick="ajax(<?= $fet->f_id; ?>)">ลบ</button>
                 </div>
                </div>
                <hr>
                <?php
                // $sum_price = $fet->f_price * $fet->ca_qty;
                $sum_total += $sum_price;
                $sum_price = 0;
             } 
             ?>
                <div class="text-center" style="margin-top: 2rem;">
                    <h2 style="padding-bottom: 2rem;">รวมทั้งหมด <?= $sum_total; ?> บาท</h2>
                    <a href="api/ac_order.php?ac=addnew&sum_total=<?= $sum_total; ?>" class="btn-dark" >สั่งอาหาร</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function ajax(id) {        
       if(confirm('ต้องการลบรายการอาหารนี้ใช่ไหม') === true) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST','api/ac_cart.php?ac=remove_product',true);
        xhr.setRequestHeader('Accept','application/json');
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.onload = () => {
            if(xhr.status === 200) {
                let res = JSON.parse(xhr.responseText);
                if(res.status) {
                    alert(res.msg);
                    window.location.reload();
                }else{
                    console.log(res);
                    
                }
            }else{
                console.log(xhr.status);
                
            }
        }
        xhr.onerror = () => {
            console.log(xhr.status);
            
        }
        xhr.send('f_id='+id);
        
       }
    }
</script>