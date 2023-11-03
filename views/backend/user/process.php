<?php

use App\Models\user;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $use=new user();
    //----------------------------------------------------------------
    $use->name = $_POST['name'];  
    $use->email = $_POST['email'];
    $use->username = $_POST['username'];
    $use->password = sha1($_POST['password']);
    $use->status = $_POST['status'];
    //Xu ly upload-----------------------------------------
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//duoi
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) 
        {
        $filename = $use->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $use->image = $filename;
        }
    } 
    //----------------------------------------------------------------
    $use->created_at = date('Y-m-d H:i:s');
    $use->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($use);

    $use->save();
    //----------------------------------------------------------------
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=use");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $use= user::find($id);
    if($use == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=user');
    }
    $use->name = $_POST['name'];
    $use->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $use->description = $_POST['description'];
    $use->status = $_POST['status'];
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/user/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $filename = $use->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $use->image = $filename;
        }
    }   
    $use->image = $_FILES['image']['name'];
    $use->updated_at = date('Y-m-d H:i:s');
    $use->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($use);
    $use->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=user");
}