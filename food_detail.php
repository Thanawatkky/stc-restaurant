<div class="content">
    <div class="header">
        <h1>รายละเอียด</h1>
    </div>
        <div class="col-1" style="margin: 0 auto;">
            <?php 
           
                $sql = update("SELECT * FROM tb_food WHERE f_id='".$_REQUEST['f_id']."' ");
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
                  <p><b>ราคา:</b> <?= $fet->f_price; ?> บาท</p>
                </div>
                <p style="margin-bottom: -2.25rem; margin-left: 1rem;">จำนวน</p>
                <div class="text-center">
                    <input type="number" name="qty" id="pro_qty" value="1" min="1" max="99" style="margin: 1rem 0; padding: .25rem 0; width: 20%; text-align: center; border: none;">    
                    <p style="margin-top: -2.5rem; text-align: end; margin-right: 1.5rem;">รายการ</p>
                <br>
                    <button type="button" onclick="ajax(<?= $fet->f_id; ?>)" class="btn-dark">สั่ง</button>

                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<script>
  function ajax(id) {        
       if(confirm('ต้องการเลือกรายการอาหารนี้ใช่ไหม') === true) {
        const xhr = new XMLHttpRequest();
        let qty = document.getElementById('pro_qty').value;
        xhr.open('POST','api/ac_cart.php?ac=addToCart',true);
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
        xhr.send('pro_id='+id+'&qty='+qty);
        
       }
    }
</script>