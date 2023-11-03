<?php
use App\Models\Product;
use App\Libraries\Cart;

if(isset($_REQUEST['addcart'])){
    require_once 'views/frontend/cart-addcart.php';
}else{
    require_once 'views/frontend/cart-content.php';
}
?>