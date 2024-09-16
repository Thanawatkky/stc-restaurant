<?php 
session_start();
    include 'function.php';
    if(!$_REQUEST['email'] || !$_REQUEST['password']) {
        echo json_encode(['status' => false, 'msg'=>'กรุณากรอกข้อมูลให้ครบถ้วน']);
    }else{
        $sql = update("SELECT * FROM tb_user WHERE email='".$_REQUEST['email']."' ");
        if($sql->num_rows <= 0) {
            echo json_encode(['status' => false, 'msg'=>'Email ไม่ถูกต้อง']);
        }else{
            $fet = $sql->fetch_object();

            if(md5($_REQUEST['password']) == $fet->password) {
                $_SESSION['sess_id'] = session_id();
                $_SESSION['user_id'] = $fet->user_id;
                $_SESSION['fname'] = $fet->fname;
                $_SESSION['lname'] = $fet->lname;
                $_SESSION['email'] = $fet->email;
                if($fet->user_role == 1) {
                    $role = 1;
                }else{
                    $role = 2;
                }
                echo json_encode(['status' => true, 'msg'=>'เข้าสู่ระบบสำเร็จ', 'role'=>$role]);
            }else{
                echo json_encode(['status'=>false, 'msg'=>'รหัสผ่านไม่ถูกต้อง']);
            }
        }
    }
?>