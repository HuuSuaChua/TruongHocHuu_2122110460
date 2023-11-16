<?php

use App\Models\order;
use App\Libraries\MyClass;
    if(isset($_POST['THEM'])){
        $order=new order();
        //----------------------------------------------------------------
        $order->deliveryname = $_POST['name'];
        $order->deliveryaddress = $_POST['deliveryaddress'];
        $order->deliveryphone = $_POST['deliveryphone'];
        $order->deliveryemail = $_POST['deliveryemail'];
        $order->status = $_POST['status'];
        //Xu ly upload-----------------------------------------
        
        //----------------------------------------------------------------
        $order->created_at = date('Y-m-d H:i:s');
        $order->created_by = (isset($_SESSION['user_id']) ? $_SESSION['user_id']:1);
        var_dump($order);
    
        $order->save();
        //----------------------------------------------------------------
        MyClass::set_flash('message',['msg'=>'Thêm thành công','type'=>'success']);
        header("Location:index.php?option=order");
    }
    if (isset($_POST['CAPNHAT'])) {
        $id = $_POST['id'];
        $order = order::find($id);
        if ($order == null) {
            MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
            header("location:index.php?option=order");
        }
        //lấy từ form
        $order->deliveryname = $_POST['name'];
        $order->deliveryaddress = $_POST['deliveryaddress'];
        $order->deliveryphone = $_POST['deliveryphone'];
        $order->deliveryemail = $_POST['deliveryemail'];
        $order->status = $_POST['status'];
    
        //Upload file ảnh
        if(strlen($_FILES['image']['name'])>0)
        {
            $target_dir = "../public/images/order/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(in_array($extension,['jpg','jpeg','png', 'gif', 'webp']))
            {
                $filename = $order->slug . '.' . $extension;
                move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$filename);
                $order->image = $filename;
            }
    
        }
    
        //Tự sinh ra
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
        //Lưu vào csdl
        $order->save();
        //Chuyển hướng trang
        MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
        header("location:index.php?option=order");
    }