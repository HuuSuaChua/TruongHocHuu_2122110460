<?php
use App\Models\post;
use App\Libraries\MyClass;
$id = $_REQUEST['id'];
$post = post::find($id);
if($post == null){
    MyClass::set_flash('message',['msg'=>'Lỗi trang','type'=>'danger']);
    header('Location:index.php?option=post');
}
$post->status = 0;
$post->updated_at = date('Y-m-d H:i:s');
$post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] :   1;
$post->save();
MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
header("Location:index.php?option=post");
