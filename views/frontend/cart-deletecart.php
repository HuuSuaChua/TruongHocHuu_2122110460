<?php
    use App\Libraries\Cart;
    
    $id = $_REQUEST['detelecart'];
    Cart::deleteCart($id);  
    header("Location:index.php?option=cart");
?>