<?php
use App\Models\post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$post = post::find($id);
if($post == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=post&cat=trash');
}
$post->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=post&cat=trash");
