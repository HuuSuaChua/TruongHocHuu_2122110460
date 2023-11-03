<?php
use App\Models\user;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$use = user::find($id);
if($use == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=user&cat=trash');
}
$use->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=user&cat=trash");
