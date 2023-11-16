<?php
   use App\Models\Menu;
   $list = Menu::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả menu</h1>
                  </div>
                  <div class="text-left">
                        <a class="text-success" href="index.php?option=menu">Tất cả</a>
                        <a class="text-danger" href="index.php?option=menu&cat=trash">Thùng rác</a>
                     </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  Nội dung
               </div>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th>Tên menu</th>
                                 <th>Liên kết</th>
                                 <th>Vị trí</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php if(count($list) > 0) : ?>
                                 <?php foreach ($list as $item): ?>
                              <tr class="datarow">
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <div class="name">
                                    <?= $item->name; ?>
                                    </div>
                                    <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                       <a class="text-success btn-xs" href="index.php?option=menu&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Hiện
                                       </a> |
                                       <?php else: ?>
                                          <a class="text-danger btn-xs" href="index.php?option=menu&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Ẩn
                                       </a> |
                                       <?php endif; ?>
                                       <a class="text-warning btn-xs" href="index.php?option=menu&cat=show&id=<?= $item->id;?>">
                                       <i class="fas fa-eye"></i>
                                       Chi tiết</a> |
                                       <a class="text-danger btn-xs" href="index.php?option=menu&cat=delete&id=<?= $item->id;?>">
                                       <i class="fas fa-trash"></i>
                                       Xoá</a>
                                       
                                    </div>
                                 </td>
                                 <td><?= $item->link; ?></td>
                                 <td><?= $item->type; ?></td>
                              </tr>
                                 <?php endforeach; ?>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>