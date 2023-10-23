<?php
use App\Models\order;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$order = order::find($id);
if($order == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=order&cat=trash');
}
$order->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=order&cat=trash");
