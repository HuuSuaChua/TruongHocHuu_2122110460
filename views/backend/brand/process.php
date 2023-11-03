<?php

use App\Models\Brand;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $brand=new Brand();
    //----------------------------------------------------------------
    $brand->name = $_POST['name'];
    $brand->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['name']);  
    $brand->description = $_POST['description'];
    $brand->status = $_POST['status'];
    //Xu ly upload-----------------------------------------
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/brand/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (in_array($extension,['jpg','jpeg','png','gif','webp'])) 
        {
        $filename = $brand->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir . $filename);
        $brand->image = $filename;
        }
    } 
    //----------------------------------------------------------------
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($brand);

    $brand->save();
    //----------------------------------------------------------------
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=brand");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $brand= Brand::find($id);
    if($brand == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=brand');
    }
    $brand->name = $_POST['name'];
    $brand->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $brand->description = $_POST['description'];
    $brand->status = $_POST['status'];
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/brand/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $filename = $brand->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $brand->image = $filename;
        }
    }   
    $brand->image = $_FILES['image']['name'];
    $brand->updated_at = date('Y-m-d H:i:s');
    $brand->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($brand);
    $brand->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=brand");
}