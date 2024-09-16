<?php 
    session_start();
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'addToCart':
                if(isset($_REQUEST['pro_id']) && isset($_REQUEST['qty'])) {
                     $sql = update("SELECT ca_product FROM tb_cart WHERE ca_product='".$_REQUEST['pro_id']."' AND ISNULL(order_id)  ");
                     $num = $sql->num_rows;
                     if($num <= 0) {
                        $data = [
                            'ca_product' => $_REQUEST['pro_id'],
                            'ca_user' => $_SESSION['user_id'],
                            'ca_qty' => $_REQUEST['qty']
                        ];
                        insertDB("tb_cart",$data);
                     }else{
                        update("UPDATE tb_cart SET ca_qty = ca_qty+'".(int)$_REQUEST['qty']."' WHERE ca_user='".$_SESSION['user_id']."' ");
                     }
                    echo json_encode(['status'=>true, 'msg'=>'เพิ่มรายการอาหารเข้าตะกร้าของคุณแล้ว']);
                }else{
                    throw new Exception("Internal parameter", 400);
                    
                }
                break;
            case "remove_product":
                if(isset($_REQUEST['f_id'])) {
                    $query = update("DELETE FROM tb_cart WHERE ca_product='".$_REQUEST['f_id']."' AND ca_user='".$_SESSION['user_id']."' AND ISNULL(order_id) ");
                    if($query) {
                        echo json_encode(['status' => true, 'msg' => 'นำรายการอาหารออกจากตะกร้าคุณแล้ว']);
                    }else{
                      throw new Exception("Internal server error", 500);
                      
                    }
                }else{
                    throw new Exception("Parameter isn't sended", 400);
                }
                break;
        }
    }
?>