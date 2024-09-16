<?php 
session_start();
    include 'function.php';
    if(isset($_REQUEST['ac'])) {
        switch ($_REQUEST['ac']) {
            case 'edit_profile':
                $data = [
                    "email"=>$_REQUEST['email'],
                    "fname"=>$_REQUEST['fname'],
                    "lname"=>$_REQUEST['lname'],
                ];
                $id = [
                    "user_id"=>$_SESSION['user_id']
                ];
                if(updateDB('tb_user',$data,$id)) {
                    echo json_encode(['status'=>true, "msg"=>"แก้ไขข้อมูลส่วนตัวสำเร็จ"]);
                }else{
                    throw new Exception("Internal server", 500);
                }
                break;
                case 'change_password':
                    $sql = update("SELECT password FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
                    $fet = $sql->fetch_object();
                    if(md5($_REQUEST['current_password']) == $fet->password) {
                        if($_REQUEST['new_password'] == $_REQUEST['confirm_password']) {
                            $data = [
                                'password' => md5($_REQUEST['new_password'])
                            ];
                            $id = [
                                'user_id'=>$_SESSION['user_id']
                            ];
                            if(updateDB('tb_user', $data, $id)) {
                                echo json_encode(['status' => true, 'msg' => 'เปลี่ยนรหัสผ่านสำเร็จ']);
                            }else{
                                throw new Exception("Internal Server", 500);
                                
                            }
                        }else{
                            echo json_encode(['status'=>false, 'msg'=>'คุณยืนยันรหัสผ่านไม่ตรงกัน']);
                        }
                    }else{
                        echo json_encode(['status' => false, 'msg'=>'คุณกรอกรหัสผ่านปัจจุบันไม่ถูกต้อง']);
                    }
                    break;
        }
    }
?>