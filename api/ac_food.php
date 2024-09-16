<?php
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'add':
                $data = [
                    'f_name'=>$_REQUEST['f_name'],
                    'f_detail'=>$_REQUEST['f_detail'],
                    'f_price'=>$_REQUEST['f_price']
                ];
                if(insertDB('tb_food',$data)) {
                    echo json_encode(['status'=>true, 'msg'=>'เพิ่มข้อมูลอาหารสำเร็จ']);
                }else{
                    throw new Exception("Internal Server", 500);
                    
                }
                break;
            case 'edit':
                $data = [
                    'f_name'=>$_REQUEST['f_name'],
                    'f_detail'=>$_REQUEST['f_detail'],
                    'f_price'=>$_REQUEST['f_price']
                ];
                $id = [
                    'f_id'=>$_REQUEST['f_id']
                ];
                if(updateDB('tb_food',$data,$id)) {
                    echo json_encode(['status'=>true, 'msg'=>'แก้ไขข้อมูลสำเร็จ']);
                }else{
                    throw new Exception("Internal Server", 500);
                }
                break;

            case 'del':
                if(update("DELETE FROM tb_food WHERE f_id='".$_REQUEST['f_id']."' ")) {
                    echo json_encode(['status'=>true, 'msg'=>'ลบรายการอาหารสำเร็จ']);
                }else{
                    throw new Exception("Internal Server", 500);
                }
                break;
        }
    }
?>