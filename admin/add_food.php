<div class="content">
    <div style="text-align: center; margin: 1.5rem 0;">
        <?php 
            if(isset($_REQUEST['f_id'])) {

        ?>
        <h2 class="text-header">แก้ไขรายการอาหาร</h2>
        <?php }else{ ?>
            <h2 class="text-header">แก้ไขรายการอาหาร</h2>
            <?php } ?>
    </div>
    <div class="box-profile">
            
                <?php 
                    if(isset($_REQUEST['f_id'])) {  
                        $sql = update("SELECT * FROM tb_food WHERE f_id='".$_REQUEST['f_id']."' ");
                        $fet = $sql->fetch_object();
                ?>
                <form action="../api/ac_food.php?ac=edit" method="post" id="frm_addFood">
                    <div class="mb-3">
                        <input type="hidden" name="f_id" id="f_id" value="<?= $fet->f_id; ?>" readonly>
                        <label for="f_name">รายการอาหาร</label>
                        <input type="text" name="f_name" id="f_name" value="<?= $fet->f_name; ?>" class="form-control" placeholder="example Noodle" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="f_price">ราคา</label>
                        <input type="text" name="f_price" id="f_price" value="<?= $fet->f_price; ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="f_price">รายละเอียด</label>
                        <textarea name="f_detail" id="f_detail" cols="55" rows="8" class="txt_detail" style="border-color: lightgray; border-radius: 20px; padding: .5rem; resize: none;" required><?= $fet->f_detail; ?></textarea>
                    </div>
                    <div class="mt-2">
                        <button type="submit" style="text-transform: uppercase;" class="btn-outline-success">Continue</button>
                    </div>
                </form>
                <?php }else{ ?>
                    <form action="../api/ac_food.php?ac=add" method="post" id="frm_addFood">
                    <div class="mb-3">
                        <label for="f_name">รายการอาหาร</label>
                        <input type="text" name="f_name" id="f_name" class="form-control" placeholder="example Noodle" required>
                    </div>
                    <div class="mb-3">
                        <label for="f_price">ราคา</label>
                        <input type="number" name="f_price" id="f_price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="f_price">รายละเอียด</label>
                        <textarea name="f_detail" id="f_detail" cols="55" rows="8" class="txt_detail" style="border-color: lightgray; border-radius: 20px; padding: .5rem; resize: none;">

                        </textarea>
                    </div>
                    <div class="mt-2">
                        <button type="submit" style="text-transform: uppercase;" class="btn-outline-success">Continue</button>
                    </div>
                </form>
                <?php } ?>
    </div>
</div>
<script>
    document.getElementById('frm_addFood').addEventListener('submit',(e) => {
        formSubmit(e)
    });
</script>