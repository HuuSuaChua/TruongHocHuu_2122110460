<?php

use App\Models\Contact;
use App\Libraries\MyClass;
if(isset($_POST['THEM'])){
    $contact=new contact();
    //----------------------------------------------------------------
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->status = $_POST['status'];
    //Xu ly upload-----------------------------------------
    //----------------------------------------------------------------
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
    var_dump($contact);

    $contact->save();
    //----------------------------------------------------------------
    MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
    header("Location:index.php?option=contact");
}
if (isset($_POST['CAPNHAT'])) {
    $id = $_POST['id'];
    $contact = contact::find($id);
    if ($contact == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=contact");
    }
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->email = $_POST['email'];
    $contact->phone = $_POST['phone'];
    $contact->title = $_POST['title'];
    $contact->content = $_POST['content'];
    $contact->status = $_POST['status'];
    //Upload file ảnh


    //Tự sinh ra
    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    //Lưu vào csdl
    $contact->save();
    //Chuyển hướng trang
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=contact");
}