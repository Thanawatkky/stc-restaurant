<?php 
session_start();
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'addnew':
                $data = [
                    'cus_name' => $_SESSION['user_id'],
                    'total_price' => $_REQUEST['sum_total'],
                ];
                insertDB('tb_order',$data);
                $sql_max = update("SELECT MAX(order_id) AS order_max FROM tb_order WHERE cus_name='".$_SESSION['user_id']."' ");
                $fet_max = $sql_max->fetch_object();
                $sql_update = update("UPDATE tb_cart SET order_id='".$fet_max->order_max."' WHERE ca_user='".$_SESSION['user_id']."' AND ISNULL(order_id) ");
                header("Location: ../index.php?p=myorder");
                break;
            case 'user_check_out':
                $data = [
                    'order_status' => 1
                ];

                $id = [
                    'order_id' => $_REQUEST['order_id']
                ];
               if(updateDB('tb_order',$data, $id)) {
                echo json_encode(['status'=>true, 'msg'=>'กรุณารอพนังงานตรวจสอบความเรียบร้อยก่อน ทำการ Checkout']);
               }else{
                throw new Exception("Internal server", 500);
               }
               break;
            case 'confirm_order':
                    if(isset($_REQUEST['order_id'])) {
                        $data = [
                            'order_status' => 1
                        ];
                        $id = [
                            'order_id' => $_REQUEST['order_id']
                        ];
                       echo updateDB('tb_order',$data,$id) ? header("Location: ../admin/index.php?p=order") : throw new Exception("Internal server error", 500);
                       
                        
                    }
                break;
            case 'served':
                    if(isset($_REQUEST['order_id'])) {
                        $data = [
                            'order_status' => 2
                        ];
                        $id = [
                            'order_id' => $_REQUEST['order_id']
                        ];
                       echo updateDB('tb_order',$data,$id) ? header("Location: ../admin/index.php?p=order") : throw new Exception("Internal server error", 500);
                        
                    }
                break;
            case 'order_complete':
                    if(isset($_REQUEST['order_id'])) {
                        $data = [
                            'order_status' => 3
                        ];
                        $id = [
                            'order_id' => $_REQUEST['order_id']
                        ];
                       echo updateDB('tb_order',$data,$id) ? header("Location: ../admin/index.php?p=order") : throw new Exception("Internal server error", 500);
                        
                    }
                break;
        }
    }
?>