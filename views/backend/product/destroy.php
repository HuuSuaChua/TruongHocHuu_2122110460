<?php
use App\Models\Product;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$product = Product::find($id);
if($product == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=product&cat=trash');
}
$product->delete();
MyClass::set_flash('message',['msg'=>'Xóa khỏi Database thành công','type'=>'success']);
header("Location:index.php?option=product&cat=trash");
