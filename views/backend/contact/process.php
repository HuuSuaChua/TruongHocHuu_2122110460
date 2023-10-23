<?php

use App\Models\Contact;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $contact=new Contact();
    //----------------------------------------------------------------
    $contact->name = $_POST['name'];
    $contact->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['name']);  
    $contact->description = $_POST['description'];
    $contact->status = $_POST['status'];
    //Xu ly upload-----------------------------------------
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/contact/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));//duoi
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) 
        {
        $filename = $contact->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $contact->image = $filename;
        }
    } 
    //----------------------------------------------------------------
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($contact);

    $contact->save();
    //----------------------------------------------------------------
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=contact");
}
if(isset($_POST['CAPNHAT'])){
    $id = $_POST['id'];
    $contact= Contact::find($id);
    if($contact == null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
        header('Location:index.php?option=contact');
    }
    $contact->name = $_POST['name'];
    $contact->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"ERORR";  
    $contact->description = $_POST['description'];
    $contact->status = $_POST['status'];
    if (strlen($_FILES[ 'image']['name']) > 0) 
    {
        $target_dir = "../public/images/contact/";
        $target_file = $target_dir. basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
        $filename = $contact->slug .'.'. $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir. $filename);
        $contact->image = $filename;
        }
    }   
    $contact->image = $_FILES['image']['name'];
    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($contact);
    $contact->save();
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("Location:index.php?option=contact");
}