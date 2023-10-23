<?php
use App\Models\Brand;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$brand = Brand::find($id);
if($brand == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=brand&cat=trash');
}
$brand->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=brand&cat=trash");
