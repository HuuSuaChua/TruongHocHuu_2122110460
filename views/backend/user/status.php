<?php
use App\Models\user;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$use= user::find($id);
if($use==null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header("Location:index.php?option=use");

}
$use->status=($use->status==1)?2:1;
$use->updated_at= date('Y-m-d H:i:s');
$use->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
$use->save();
MyClass::set_flash('message',['msg'=>'Thay đổi trạng thái thành công','type'=>'success']);
header("Location:index.php?option=user");