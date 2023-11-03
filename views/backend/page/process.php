<?php

use App\Models\Post;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $page=new Post();
    //----------------------------------------------------------------
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['title']);  
    $page->detail = $_POST['detail'];
    $page->image = $_POST['image'];
    $page->status = $_POST['status'];
    //Xu ly upload-----------------------------------------
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/page/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//duoi
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) 
        {
        $filename = $page->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $page->image = $filename;
        }
    } 
    //----------------------------------------------------------------
    $page->created_at = date('Y-m-d H:i:s');
    $page->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($page);

    $page->save();
    //----------------------------------------------------------------
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=page");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $page= Post::find($id);
    if($page == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=page');
    }
    $page->name = $_POST['name'];
    $page->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $page->description = $_POST['description'];
    $page->status = $_POST['status'];
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/page/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $filename = $page->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $page->image = $filename;
        }
    }   
    $page->image = $_FILES['image']['name'];
    $page->updated_at = date('Y-m-d H:i:s');
    $page->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($page);
    $page->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=page");
}