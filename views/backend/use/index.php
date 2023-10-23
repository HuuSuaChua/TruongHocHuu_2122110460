<?php
   use App\Models\User;
   $list = User::where('status','!=',0)
   ->orderBy('created_at','DESC')
   ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả thành viên</h1>
                     <a href="index.php?option=use&cat=create" class="btn btn-sm btn-primary">Thêm thành viên</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  Noi dung
               </div>
               <div class="card-body">
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
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
                              <img src="../public/images/<?= $item->image; ?>" alt="user.jpg">
                           </td>
                           <td>
                              <div class="name">
                              <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                                    <?php if($item->status == 1): ?>
                                       <a class="text-success btn-xs" href="index.php?option=use&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Hiện
                                       </a> |
                                       <?php else: ?>
                                          <a class="text-danger btn-xs" href="index.php?option=use&cat=status&id=<?= $item->id;?>">
                                       <i class="fas fa-toggle-on"></i>
                                       Ẩn
                                       </a> |
                                       <?php endif; ?>
                                       <a class="text-warning btn-xs" href="index.php?option=use&cat=edit&id=<?= $item->id;?>">
                                       <i class="fas fa-edit"></i>
                                       Chỉnh sửa</a> |
                                       <a class="text-warning btn-xs" href="index.php?option=use&cat=show&id=<?= $item->id;?>">
                                       <i class="fas fa-eye"></i>
                                       Chi tiết</a> |
                                       <a class="text-danger btn-xs" href="index.php?option=use&cat=delete&id=<?= $item->id;?>">
                                       <i class="fas fa-trash"></i>
                                       Xoá</a>
                                       
                                    </div>
                           </td>
                           <td><?= $item->phone; ?></td>
                           <td><?= $item->email; ?></td>
                        </tr>
                           <?php endforeach; ?>
                              <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>