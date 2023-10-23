<?php
use App\Models\Category;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$category = Category::find($id);
if($category == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=category&cat=trash');
}
$category->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=category&cat=trash");
