<?php
use App\Libraries\MyClass;
?>
<?php if(MyClass::has_flash('message')) :  ?>
                     <?php $arr = MyClass::get_flash('message'); ?>
                     <div class="alert alert-<?= $arr['type']; ?>">
                        <?= $arr['msg'];?> 
                     </div>
                 <?php endif;?>