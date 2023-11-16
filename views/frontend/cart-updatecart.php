<?php
use App\Libraries\Cart;
    
    $arr_qty = $_POST['qty'];
    foreach ($arr_qty as $id => $qty){
        Cart::updateCart($id,$qty);
        header("Location:index.php?option=cart");
    }
?>