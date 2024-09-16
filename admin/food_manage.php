<div class="wrapper">
    <div class="header">
        <h2 class="txt-header">จัดการรายการอาหาร</h1>
    </div>
    <div class="text-end">
        <a href="index.php?p=add_food" class="btn-primary">เพิ่ม</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>รายการอาหาร</th>
                <th>รายละเอียด</th>
                <th>ราคา
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sql = update("SELECT * FROM tb_food");
                $i=0;
                while ($fet = $sql->fetch_object()) {
                    $i++;
            ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $fet->f_name; ?></td>
                <td><?= $fet->f_detail; ?></td>
                <td><?= $fet->f_price; ?></td>
                <td>
                    <a href="index.php?p=add_food&f_id=<?= $fet->f_id; ?>" style="text-decoration: none;" class="btn-warning">แก้ไข</a>
                    <button type="button" id="btn-del" onclick="ajax_food(<?php echo $fet->f_id; ?>)" class="btn-danger">ลบ</button>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function ajax_food(id) {
        
        if(confirm("ต้องการลบข้อมูลรายการอาหารหรือไม่?") == true) {
            const xhr = new XMLHttpRequest();
        xhr.open('post','../api/ac_food.php?ac=del&f_id='+id,true);
        xhr.setRequestHeader('Accept','application/json');
        // xhr.setRequestHeader('Content-Type','application/json');
 

       xhr.onload = () => {
        if(xhr.status === 200) {
            let data = JSON.parse(xhr.responseText);
            if(data.status) {   
                alert(data.msg);
                window.location.reload();
            }else{
                console.log(data);
            }
        }else{
            console.log(xhr.status);
            
        }
        
       }
       xhr.onerror = () => {
        console.log(xhr.status);
       }
        xhr.send();
        }
    }    
</script>