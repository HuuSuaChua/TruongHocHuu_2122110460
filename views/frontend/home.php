<?php
   use App\Models\Category;
   $list_category = Category::where([['status','=',1],['parent_id','=',0]])
   ->orderBy('sort_order','ASC')
   ->get();
   
   ?>
<?php require_once "views/frontend/header.php"; ?>
<?php require_once "views/frontend/mod-slider.php"; ?>
   <section class="hdl-maincontent">
      <div class="container">
         <?php foreach($list_category as $cat): ?>
         
               <?php require "views/frontend/product-list-home.php"; ?>
         
            <?php endforeach; ?>
      </div>
   </section>
<?php require_once "views/frontend/mod-lastpost.php"; ?>
<?php require_once "views/frontend/footer.php"; ?>