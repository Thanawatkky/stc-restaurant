<?php 
    include 'function.php';
    
    if(!$_REQUEST['email'] || !$_REQUEST['fname'] || !$_REQUEST['lname'] || !$_REQUEST['password']) {
        echo json_encode(['status' => false, 'msg'=>'กรุณากรอกข้อมูลให้ครบถ้วน']);
    }else{
        $sql = update("SELECT email FROM tb_user WHERE email='".$_REQUEST['email']."' ");
        if($sql->num_rows <= 0) {
            $password = md5($_REQUEST['password']);
            $data = [
                'email' => $_REQUEST['email'],
                'password' => $password,
                'fname'=>$_REQUEST['fname'],
                'lname'=>$_REQUEST['lname'],
                'user_role'=>2
            ];
            if(insertDB('tb_user',$data)) {
                echo json_encode(['status' => true, 'msg'=>'สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบก่อนใช้งาน', 'location'=>'login.php']);
            }else{
                throw new Exception("Internal Server", 500);
            }
        }else{
            echo json_encode(['status' => false, 'msg'=>'Email ดังกล่าวถูกใช้งานแล้ว กรุณาลองใหม่อีกครั้ง']);
        }
        
    }
?>