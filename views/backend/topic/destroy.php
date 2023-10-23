<?php
use App\Models\topic;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$topic = topic::find($id);
if($topic == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=topic&cat=trash');
}
$topic->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=topic&cat=trash");
