<?php
use App\Models\contact;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$contact = contact::find($id);
if($contact == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=contact&cat=trash');
}
$contact->status = '2';
$contact->updated_at = date('Y-m-d H:i:s');
$contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] :   1;
$contact->save();
MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
header("Location:index.php?option=contact&cat=trash");